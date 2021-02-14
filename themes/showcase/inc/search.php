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
