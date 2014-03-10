/* 
 * @author chariss
 */

if (!String.prototype.trim) {
    String.prototype.trim = function() {
        return this.replace(/^\s+|\s+$/g, '');
    };
}

function formatNumber(mask, value) {
    var strValue = '' + value;
    return strValue.length > mask.length ? strValue : (mask + value).slice(-mask.length);
}

// global AJAX error handler
$.ajaxSetup({
    error: function(xhr) {
        if (xhr.status === 401 || xhr.status === 403) {
            window.location.reload();
        }
    }
});