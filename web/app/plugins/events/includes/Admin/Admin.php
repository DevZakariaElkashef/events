<?php

namespace Events\Admin;

class Admin
{
    public function __construct()
    {
        new OptionPage; // option page to control evnents in frontend
        new EventsPage; // events page to display the list and create ^ edit
        new RegisterSetting; // add the option key names in the databse table option
    }
}
