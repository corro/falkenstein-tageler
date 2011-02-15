<?php

function TagelerBuildRoute(&$query)
{
  $segments = array();
  if(isset($query['id']))
  {
    $segments[] = $query['id'];
    unset($query['id']);
  }
  unset($query['controller']);
  return $segments;
}

function TagelerParseRoute($segments)
{
  $vars = array();

  $vars['cid'] = array($segments[0]);
  $vars['controller'] = 'tageler_detail';
  
  return $vars;
}
