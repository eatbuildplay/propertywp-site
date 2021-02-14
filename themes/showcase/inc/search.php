<?php

function searchDefaultPropertyTypes() {

  $choices = [];

  $choice = new stdClass;
  $choice->value = 'condo';
  $choice->title = 'Condo';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = 'apartment';
  $choice->title = 'Apartment';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = 'land';
  $choice->title = 'Land';
  $choices[] = $choice;

  return $choices;

}
