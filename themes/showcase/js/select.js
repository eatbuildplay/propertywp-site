(function($) {

  $.select = function(el, options) {

    // To avoid scope issues, use 'base' instead of 'this'
    // to reference this class from internal events and functions.
    var base = this;
    base.iconRotation = 0;
    base.isOpen = false;
    base.values = [];

    // Access to jQuery and DOM versions of element
    base.$el = $(el);
    base.el = el;

    base.init = function() {

      // set options
      base.options = $.extend( {}, $.select.defaultOptions, options );

      // set items which are pairs of {value, title}
      base.items = {};
      base.options.items.forEach( function( item ) {
        base.items[ item.value ] = item;
      });

      base.$el.data("select", base);
      base.$el.addClass('aab-select');
      base.$el.append('<h2 class="d-flex justify-content-between align-items-center"><span>' + base.options.label + '</span> <i class="fas fa-angle-down"></i></h2>');

      let $selectListEl = $('<div class="select-list"></div>').appendTo( base.$el );
      $selectListEl.append('<ul></ul>');

      if( base.options.filter ) {
        $selectListEl.append('<div class="select-search"><input type="text" placeholder="Filter..." /></div>');
        base.$el.find(".select-search input").on('keyup', base.selectSearch);
      }

      // run search to setup with items
      base.selectSearch();

      /* Click Handlers */
      base.$el.find("h2").on('click', base.selectClick);
      base.$el.on('click', 'li:not(.selected)', base.itemClick);

      /* handlers and content only for multiple selections */
      if( base.options.multiple ) {
        $selectListEl.append('<div class="select-complete"><button>Complete</button></div>');
        base.$el.find(".select-complete button").on('click', base.completeClick);
        base.$el.on('click', 'li.selected', base.itemClickRemove);
      }

      /* Catch open event from this or other selectors */
      $( document ).on( "selector_open", function( event, selector ) {

        if( base.$el != selector.$el ) {

          // if is open, close it
          if( base.isOpen ) {
            base.close();
          }

        }

      });

    };

    base.selectSearch = function() {

      if( !base.options.filter ) {
        base.selectRefreshItems( base.items );
        return;
      }

      var searchText = base.$el.find('.select-search input').val();
      if( searchText.length == 0 ) {
        base.selectRefreshItems( base.items );
        return;
      }

      searchText = searchText.toLowerCase();

      var matches = [];

      Object.entries( base.items ).forEach(obj => {

        const [key, item] = obj;

        let title = item.title.toLowerCase();
        if( title.startsWith( searchText )) {
          matches.push( item );
        }

      });

      base.selectRefreshItems( matches );

    };

    base.getItemByValue = function( value ) {
      return base.items[ value ];
    }

    base.selectClick = function() {

      // set isOpen status
      if( base.isOpen ) {
        base.close();
      } else {
        base.open();
      }

    };

    base.rotateIcon = function() {

      let iEl = base.$el.find('i');
      $({rotation: 180 * base.iconRotation}).animate({rotation: 180 * !base.iconRotation}, {
        duration: 400,
        step: function(now) {
          iEl.css({'transform' : 'rotate('+ now +'deg)'});
        }
      });
      base.iconRotation = !base.iconRotation;

    };

    base.open = function() {

      base.isOpen = true;
      base.$el.find('.select-list').slideDown();
      $(document).trigger('selector_open', [ base ] );
      base.rotateIcon();

    },

    base.close = function() {

      base.isOpen = false;
      base.$el.find('.select-list').slideUp();
      $(document).trigger('selector_close', [ base ] );
      base.rotateIcon();

    };

    base.setValue = function( selection ) {

      if( typeof selection !== 'object' && selection !== null ) {
        return;
      }

      if( !base.options.multiple ) {
        base.values = []; // empty values so new value is the only one
        base.$el.find('li').removeClass('selected');
      }

      base.values.push( selection );

      let itemEl = base.getListItemEl( selection.value );
      itemEl.addClass('selected');

      base.updateValueDisplay();

    },

    base.itemClick = function() {

      let item = $(this);

      let value = item.data('value');
      let title = item.data('title');
      let selection = {
        value: value,
        title: title
      }

      // value storage and display
      base.setValue( selection, item );

      // if singular, close select
      if( !base.options.multiple ) {
        base.close();
      }

      $(document).trigger('selector_change', [ base ] );

    };

    base.itemClickRemove = function() {

      let item = $(this);
      item.toggleClass('selected');

      let value = item.data('value');

      base.values = $.grep(base.values, function(e) {
        return e.value != value;
      });

      base.updateValueDisplay();

    };

    base.updateValueDisplay = function() {

      var displayTitle = '';
      base.values.forEach( function( selection ) {
        displayTitle += selection.title + ', ';
      });
      displayTitle = displayTitle.slice(0, -2);
      base.$el.find("h2 span").html( displayTitle );

      base.$el.find("h2 span").addClass('selected');

    };

    base.completeClick = function() {
      base.close();
    };

    base.selectRefreshItems = function( items ) {

      base.$el.find("ul li").remove();
      $.each( items, function( i, v ) {
        var item = $('<li>' + v.title + '</li>').appendTo( base.$el.find('ul') );
        item.attr('data-value', v.value);
        item.attr('data-title', v.title);
      });

    };

    base.getListItemEl = function( value ) {
      return base.$el.find('[data-value="' + value + '"]');
    };

    base.init();

  };

  $.select.defaultOptions = {
    multiple: false,
    filter: false
  };

  /* internal setup */
  $.fn.select = function( args ) {

    let obj = this.data('select');

    /* Set value */
    if( args.action == 'setValue' ) {

      if( obj == undefined ) {
        return false;
      }

      let item = obj.getItemByValue( args.value );
      obj.setValue( item );
      return;

    }

    /* Get value */
    if( args == 'getValue') {

      if( obj == undefined || obj.values.length == 0 ) {
        return false;
      }

      if( obj.values.length == 1 ) {
        return obj.values[0].value;
      } else {
        var vals = [];
        obj.values.forEach( function( item ) {
          vals.push( item.value );
        });
        return vals;
      }
    }

    return this.each(function() {
      (new $.select(this, args));
    });

  };

})(jQuery);
