var choice; //user manga choice
var page; //current page title

window.onload = function()
{
    page = document.getElementById('tab_name').innerText;
    console.log('Current Page: ' + page);
    switch(page)
    {
        case 'Manga':
            //
            break;
        case 'Place Order':
            btn = document.getElementById('btn_place-order');
            btn.disabled = true;
            break;
        case 'Process Order':
            //
            break;
        default:
            //
            break;
    }

    console.log("Created by Shaun Graham for ICS 325-01");
}