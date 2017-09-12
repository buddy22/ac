 $(document).ready(function(){
     $('.sm').smartmenus({
                    showFunction: function ($ul, complete) {
                        $ul.slideDown(250, complete);
                    },
                    hideFunction: function ($ul, complete) {
                        $ul.slideUp(250, complete);
                    }
                });
            });
