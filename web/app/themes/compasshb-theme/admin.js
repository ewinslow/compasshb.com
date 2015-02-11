jQuery(document).ready(
    function()
    {
        // Convert Checkboxes to Radio
        jQuery('#categorychecklist li label input, #formatchecklist li label input').each(
            function()
            {
                this.type = "radio";
            }
        );
        // Require category and format
        jQuery('#publish').click(
            function()
            {
                // @todo: require category and format
                return;
            }
        );

    }
);
