<?php

namespace MpBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MpBundle extends Bundle
{
  public function getParent()
    {
        return 'FOSUserBundle';
    }
}
