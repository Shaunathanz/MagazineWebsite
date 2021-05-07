var page; //current page title
var selected; //magazine selected by user
var qty_magazines;
var qty_subscriptions;
var magazineSelection; //store magazine info here

window.onload = function()
{
    page = document.getElementById('tab_name').innerText;
    document.getElementById('logo').addEventListener("click", function(){goToPage("home");});
    console.log('Current Page: ' + page);
    switch(page)
    {
        case 'Manga':
            document.getElementById('li_review').addEventListener("click", function(){goToPage("review");});
            break;
        case 'Place Order':
            btn = document.getElementById('btn_place-order');
            btn.disabled = true;
            break;
        case 'Process Order':
            break;
        case 'Review':
            btn = document.getElementById('btn_place-order');
            btn.disabled = true;
            break;
        default:
            break;
    }

    console.log("Created by Shaun Graham for ICS 325-01");
}

function updateSubscriptionCount()
{
    qty_subscriptions = document.getElementById('qty_subscriptions').value;
}

/**
 * For place order and process order page. Updates image of selected magazine
 */
function updatePrevImg()
{
    var imgId;
    var imgClass;
    if(page == 'Place Order')
    {
        imgId = 'manga-img';
        imgClass = 'magazine-item';
        selected = document.getElementById('selected').value;
        localStorage.setItem("selected", selected);
    } else if(page == 'Process Order')
    {
        imgId = 'manga-img-big';
        imgClass = 'magazine-item-big';
        selected = localStorage.getItem("selected");
    } else {
        console.log("Error: Something went wrong trying to update the magazine image");
    }
    var pic = document.getElementById(imgId);
    var fileName = "";
    switch(selected)
    {
        case "My Hero Academia # 9":
            fileName = "bokuNoHero.jpg";
            break;
        case "Death Note # 1":
            fileName = "deathnote.jpg";                    
            break;
        case "Fullmetal Alchemist # 1":
            fileName = "fullmetalalchemist.jpg";
            break;
        case "Hellsing # 1":
            fileName = "hellsing.jpg";
            break;
        case "Sgt. Frog # 6":
            fileName = "kerorogunsou.jpg";
            break;
        case "Attack on Titan # 12":
            fileName = "shingekinokyojin.jpg";
            break;
        case "Space Dandy # 1":
            fileName = "spacedandy.jpg";
            break;
        case "Uzumaki # 1":
            fileName = "uzumaki.jpg";
            break;
        case "One Punch-Man # 1":
            fileName = "wanpanman.jpg";
            break;
        case "Yotsuba&! # 1":
            fileName = "yotsuba.jpg";
            break;
        default:
            break;
    }
    if(fileName != "")
    {
        pic.src = '../images/' + fileName;
        pic.title = selected;
        document.getElementsByClassName(imgClass)[0].style.display = "block";
    } else {
        document.getElementsByClassName(imgClass)[0].style.display = "none";
    }
}

/**
 * Enables / disables submit order button until fields have data entered
 */
function btnEnable()
{
    if(page == "Place Order")
    {
        qty_magazine = document.getElementById('qty_magazines').value;
        qty_subscriptions = document.getElementById('qty_subscriptions').value;
        var total = qty_magazine + qty_subscriptions;    
        if(total > 0)
        {
            btn.disabled = false;
        } else {
            btn.disabled = true;
        }
    }
    else if (page == "Review")
    {
        var textarea = document.getElementById('review');
        var content = textarea.value;
        if(content.length >= 500)
        {
            btn.disabled = true;
        }
        else if(content.length >= 3)
        {
            btn.disabled = false;
            //console.log(content.l)
        }
        else
        {
            btn.disabled = true;
        }
    }
}

/**
 * Get rid of nono words for user reviews
 */
function sanitizeInput()
{
    var textarea = document.getElementById("review");
    var value = textarea.value;
    value = value.replace("disgusting", "!@#$%");
    value = value.replace("ghastly", "!@#$%");
    value = value.replace("vile", "!@#$%");
    value = value.replace("horrible", "!@#$%");
    textarea.value = value;
}

/**
 * return to home page in current tab
 */
function goToPage(pageName)
{
    switch(pageName)
    {
        default:
            console.log("ERROR: Invalid argument passed to goToPage()");
        case "home":
            if(page != "Manga")
            {
                window.open("../index.php", "_self");
            }
            break;
        case "review":
            window.open("pages/writereview.php", "_self");
            break;
    }
}