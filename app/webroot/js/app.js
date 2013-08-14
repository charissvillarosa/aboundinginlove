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

