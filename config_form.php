<div class="plugin-description">
    <h2><?php echo __("IIIF Toolkit Embed") ?></h2>
    <p>You can choose whether or not embed codes for Mirador 2 & 3 viewers will appear on the public-facing side of your site. Those embed codes will always appear on the admin view.</p>
</div>
<div class="three-columns-alpha">
    <label for="show-embed-codes-on-public-view">Show embed codes in the public site view?</label>
    <?php echo get_view()->formCheckbox('show-embed-codes-on-public-view', null, array('checked'=>get_option('show-embed-codes-on-public-view'))); ?>
</div>