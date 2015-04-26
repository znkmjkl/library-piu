<div class='container' style='padding-right: 15px; padding-bottom: 8px; padding-top: 8px;'>
    <button class='pull-right' onClick='setLocale("pl")' <?php echo strpos($_SERVER['REQUEST_URI'], '/pl') !== false ? 'disabled' : '' ?> >PL</button>
    <button class='pull-right' onClick='setLocale("en")' <?php echo strpos($_SERVER['REQUEST_URI'], '/en') !== false ? 'disabled' : '' ?> >EN</button>
</div>