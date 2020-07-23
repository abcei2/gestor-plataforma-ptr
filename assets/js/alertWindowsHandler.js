/** Error window handler
* @param {String} headerMsg message tittle
* @param {String} comentMsg main message
* @param {function} callAcceptFunction accept button function with no parameters
* @param {function} callCancelFunction cancel button function with no parameters
*/
function alertWindow(headerMsg, comentMsg, callAcceptFunction, callCancelFunction)
{
    $('#alert-Header').html(headerMsg);
    $('#alert-comentary').html(comentMsg);
    // Clearing last click
    $('#alert-accept-button').off('click');
    $('#alert-cancel-button').off('click');
    if(callAcceptFunction)
    {
        // Clearing last click, and setting new click function
        $('#alert-accept-button').off('click').click(callAcceptFunction);
    }
    if(callCancelFunction)
    {
        // Clearing last click, and setting new click function
        $('#alert-cancel-button').off('click').click(callCancelFunction);
    }
    $('#alert-trigger').click();
}
/** success window handler
* @param {String} headerMsg message tittle
* @param {String} comentMsg main message
* @param {function} callAcceptFunction accept button function with no parameters
* @param {function} callCancelFunction cancel button function with no parameters
*/
function successWindow(headerMsg, comentMsg, callAcceptFunction, callCancelFunction)
{
    $('#modal-Header').html(headerMsg);
    $('#modal-Note').html(comentMsg);
    // Clearing last click
    $('#modal-accept-button').off('click');
    $('#modal-cancel-button').off('click');
    if(callAcceptFunction)
    {
        // Clearing last click, and setting new click function
        $('#modal-accept-button').off('click').click(callAcceptFunction);
    }
    if(callCancelFunction)
    {
        // Clearing last click, and setting new click function
        $('#modal-cancel-button').off('click').click(callCancelFunction);
    }
    $('#modal-trigger').click();
}
/** Clear successWindow buttons
 * @param {void}
 */
function successWindowClear()
{
    $('#modal-accept-button').click();
    $('#modal-cancel-button').click();
}
/** Warning window handler
* @param {String} headerMsg message tittle
* @param {String} comentMsg main message
* @param {function} callAcceptFunction accept button function with no parameters
* @param {function} callCancelFunction cancel button function with no parameters
*/
function warningWindow(headerMsg, comentMsg, callAcceptFunction, callCancelFunction)
{
    $('#warning-Header').html(headerMsg);
    $('#warning-comentary').html(comentMsg);
    //Clearing last click
    $('#warning-accept-button').off('click');
    $('#warning-cancel-button').off('click');
    if(callAcceptFunction)
    {
        // Clearing last click, and setting new click function
        $('#warning-accept-button').off('click').click(callAcceptFunction);
    }
    if(callCancelFunction)
    {
        // Clearing last click, and setting new click function
        $('#warning-cancel-button').off('click').click(callCancelFunction);
    }
    $('#warning-trigger').click();
}