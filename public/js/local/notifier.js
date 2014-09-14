var Notifier = function()
{
    this.showSuccess = function(title, content, callback)
    {
        var title = typeof title !== 'undefined' ? title : " "
            , content = typeof content !== 'undefined' ? content : " ";

        $.Notify({style:{background:"#60A917", color:"white"}, caption:title, content:content});

        if(typeof callback != 'undefined')
        {
            setTimeout(callback, 1500);
        }
    }

    this.showInfo = function(title, content, callback)
    {
        var title = typeof title !== 'undefined' ? title : " "
            ,content = typeof content !== 'undefined' ? content : " ";

        $.Notify({style:{background:"#1ba1e2", color:"white"}, caption:title, content:content});

        if(typeof callback != 'undefined')
        {
            setTimeout(callback, 1500);
        }
    }

    this.showAlert = function(title, content, callback)
    {
        var title = typeof title !== 'undefined' ? title : " " 
            ,content = typeof content !== 'undefined' ? content : " ";

        $.Notify({style:{background:"orange", color:"white"}, caption:title, content:content});

        if(typeof callback != 'undefined')
        {
            setTimeout(callback, 1500);
        }
    }

    this.showError = function(title, content, callback)
    {
        var title = typeof title !== 'undefined' ? title : " "
            , content = typeof content !== 'undefined' ? content : " ";

        $.Notify({style:{background:"red", color:"white"}, caption:title, content:content});

        if(typeof callback != 'undefined')
        {
            setTimeout(callback, 1500);
        }
    }

    this.showNote = function(title, content, color, callback)
    {
        var title = typeof title !== 'undefined' ? title : " "
            , content = typeof content !== 'undefined' ? content : "#1ba1e2";

        $.Notify({style:{background: color, color:"white"}, caption:title, content:content});

        if(typeof callback != 'undefined')
        {
            setTimeout(callback, 1500);
        }
    }
}