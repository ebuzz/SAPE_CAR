var Notifier = function()
{
    this.showSuccess = function(title, content)
    {
        var title = typeof title !== 'undefined' ? title : " "
            , content = typeof content !== 'undefined' ? content : " ";

        $.Notify({style:{background:"#60A917", color:"white"}, caption:title, content:content});
    }

    this.showInfo = function(title, content)
    {
        var title = typeof title !== 'undefined' ? title : " "
            ,content = typeof content !== 'undefined' ? content : " ";

        $.Notify({style:{background:"#1ba1e2", color:"white"}, caption:title, content:content});
    }

    this.showAlert = function(title, content)
    {
        var title = typeof title !== 'undefined' ? title : " " 
            ,content = typeof content !== 'undefined' ? content : " ";

        $.Notify({style:{background:"orange", color:"white"}, caption:title, content:content});
    }

    this.showError = function(title, content)
    {
        var title = typeof title !== 'undefined' ? title : " "
            , content = typeof content !== 'undefined' ? content : " ";

        $.Notify({style:{background:"red", color:"white"}, caption:title, content:content});
    }

    this.showNote = function(title, content, color)
    {
        var title = typeof title !== 'undefined' ? title : " "
            , content = typeof content !== 'undefined' ? content : " "
            , content = typeof content !== 'undefined' ? content : "#1ba1e2";

        $.Notify({style:{background: color, color:"white"}, caption:title, content:content});
    }
}