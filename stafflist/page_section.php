<?php
    require_once('header.php');
?>
<script type="text/javascript" src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/js/page_section.js?ver=1"></script>

<h1>Seção</h1>
<div id="section-management">
    <div id="section-add-part">
        <input type="text" name="" id="new-section-en" placeholder="Name English*" maxlength="100" required>
        <input type="text" name="" id="new-section-pt" placeholder="Name Portuguese" maxlength="100">
        <input type="text" name="" id="new-section-es" placeholder="Name Espanish" maxlength="100">
        <input type="text" name="" id="new-section-fr" placeholder="Name Français" maxlength="100">
        <input type="button" name="" id="add-section-btn" value="Add new" class="btn btn-primary">
    </div>
    <div id="section-list">
        <table class="table">
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>