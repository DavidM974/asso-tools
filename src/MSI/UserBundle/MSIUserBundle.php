<?php

namespace MSI\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MSIUserBundle extends Bundle
{
  public function getParent()
  {
    return 'FOSUserBundle';
  }
}
