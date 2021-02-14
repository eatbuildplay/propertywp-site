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

function searchDefaultBedrooms() {

  $choices = [];

  $choice = new stdClass;
  $choice->value = '0';
  $choice->title = '0 Bedrooms (Bachelor)';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = '1';
  $choice->title = '1+ Bedrooms';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = '2';
  $choice->title = '2+ Bedrooms';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = '3';
  $choice->title = '3+ Bedrooms';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = '4';
  $choice->title = '4+ Bedrooms';
  $choices[] = $choice;

  return $choices;

}

function searchDefaultBathrooms() {

  $choices = [];

  $choice = new stdClass;
  $choice->value = '1';
  $choice->title = '1+ Bathroom';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = '2';
  $choice->title = '2+ Bathrooms';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = '3';
  $choice->title = '3+ Bathrooms';
  $choices[] = $choice;

  return $choices;

}

function searchDefaultPriceMinimumBuy() {

  $choices = [];

  $choice = new stdClass;
  $choice->value = '10000';
  $choice->title = '10,000';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = '20000';
  $choice->title = '25,000';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = '25000';
  $choice->title = '25,000';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = '50000';
  $choice->title = '50,000';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = '100000';
  $choice->title = '100,000';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = '150000';
  $choice->title = '150,000';
  $choices[] = $choice;

  return $choices;

}

function searchDefaultPriceMaximumBuy() {

  $choices = [];

  $choice = new stdClass;
  $choice->value = '10000';
  $choice->title = '10,000';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = '20000';
  $choice->title = '25,000';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = '25000';
  $choice->title = '25,000';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = '50000';
  $choice->title = '50,000';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = '100000';
  $choice->title = '100,000';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = '150000';
  $choice->title = '150,000';
  $choices[] = $choice;

  return $choices;

}

function searchDefaultPriceMinimumRent() {

  $choices = [];

  $choice = new stdClass;
  $choice->value = '500';
  $choice->title = '500';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = '1000';
  $choice->title = '1,000';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = '1500';
  $choice->title = '1,500';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = '2000';
  $choice->title = '2,000';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = '2500';
  $choice->title = '2,500';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = '3000';
  $choice->title = '3,000';
  $choices[] = $choice;

  return $choices;

}

function searchDefaultPriceMaximumRent() {

  $choices = [];

  $choice = new stdClass;
  $choice->value = '500';
  $choice->title = '500';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = '1000';
  $choice->title = '1,000';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = '1500';
  $choice->title = '1,500';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = '2000';
  $choice->title = '2,000';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = '2500';
  $choice->title = '2,500';
  $choices[] = $choice;

  $choice = new stdClass;
  $choice->value = '3000';
  $choice->title = '3,000';
  $choices[] = $choice;

  return $choices;

}
