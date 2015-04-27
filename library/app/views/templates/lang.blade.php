<div class='container' style='padding-right: 15px; padding-bottom: 8px; padding-top: 8px;'>
    <button style='padding: 2px 4px; margin-left: 3px;' class='btn btn-default pull-right' onClick='setLocale("pl")' <?php echo App::getLocale() == 'pl' ? 'disabled' : '' ?> ><span class="flag-icon flag-icon-pl"></span>&nbsp;PL</button>
    <button style='padding: 2px 4px;' class='btn btn-default pull-right' onClick='setLocale("en")' <?php echo App::getLocale() == 'en' ? 'disabled' : '' ?> ><span class="flag-icon flag-icon-gb"></span>&nbsp;EN</button>&nbsp;
</div>