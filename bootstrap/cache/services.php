<?php return array (
  'providers' => 
  array (
    0 => 'Laravel\\Pail\\PailServiceProvider',
    1 => 'Laravel\\Sail\\SailServiceProvider',
    2 => 'Laravel\\Tinker\\TinkerServiceProvider',
    3 => 'Maatwebsite\\Excel\\ExcelServiceProvider',
    4 => 'Carbon\\Laravel\\ServiceProvider',
    5 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    6 => 'Termwind\\Laravel\\TermwindServiceProvider',
  ),
  'eager' => 
  array (
    0 => 'Laravel\\Pail\\PailServiceProvider',
    1 => 'Maatwebsite\\Excel\\ExcelServiceProvider',
    2 => 'Carbon\\Laravel\\ServiceProvider',
    3 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    4 => 'Termwind\\Laravel\\TermwindServiceProvider',
  ),
  'deferred' => 
  array (
    'Laravel\\Sail\\Console\\InstallCommand' => 'Laravel\\Sail\\SailServiceProvider',
    'Laravel\\Sail\\Console\\PublishCommand' => 'Laravel\\Sail\\SailServiceProvider',
    'command.tinker' => 'Laravel\\Tinker\\TinkerServiceProvider',
  ),
  'when' => 
  array (
    'Laravel\\Sail\\SailServiceProvider' => 
    array (
    ),
    'Laravel\\Tinker\\TinkerServiceProvider' => 
    array (
    ),
  ),
);