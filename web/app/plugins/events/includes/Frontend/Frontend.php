<?php

namespace Events\Frontend;

class Frontend
{
    public function __construct()
    {
        new RedirectTemplate(); // redirect to plugin template
        new PermaLinkSetting(); // change permalink structure to Post Name
    }
}