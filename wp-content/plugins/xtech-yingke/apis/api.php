<?php

namespace XTech_Yingke\APIs;

class API_Base {
  protected function registerRoute($pathname, $callback, $class, $method = 'GET') {
      register_rest_route(
          'xtech/v1',
          '/' . $pathname,
          [
              'methods'  => $method,
              'callback' => [$class, $callback],
          ]
      );
  }
}