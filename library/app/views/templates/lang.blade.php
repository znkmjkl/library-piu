<div class='container' style='padding-right: 15px; padding-bottom: 8px; padding-top: 8px;'>
    <button class='pull-right' onClick='setLocale("pl")' <?php echo App::getLocale() == 'pl' ? 'disabled' : '' ?> >PL</button>
    <button class='pull-right' onClick='setLocale("en")' <?php echo App::getLocale() == 'en' ? 'disabled' : '' ?> >EN</button>
</div>