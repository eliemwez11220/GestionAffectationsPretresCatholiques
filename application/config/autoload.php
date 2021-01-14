<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#Importation automatique des packages
$autoload['packages'] = array();

# Importation auto des librairies - modules de composants externes
$autoload['libraries'] = array('database', 'email', 'session', 'form_validation', 'pagination', 'upload', 'cart');

# importation des fichiers externes
$autoload['helper'] = array('url', 'file', 'html', 'text', 'form', 'email', 'date');

$autoload['drivers'] = array();

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('Secure_model','App_model');
