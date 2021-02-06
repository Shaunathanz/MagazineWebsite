var page; //current page title
var selected; //magazine selected by user

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
            document.getElementById('logo').addEventListener("click", goHome);
            btn = document.getElementById('btn_place-order');
            btn.disabled = true;
            break;
        case 'Process Order':
            updatePrevImg();
            document.getElementById('logo').addEventListener("click", goHome);
            break;
        default:
            //
            break;
    }

    console.log("Created by Shaun Graham for ICS 325-01");
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
    var quantity = document.getElementById('quantity').value;
    if(quantity >= 1 && Number.isInteger(Number(quantity)) && selected != undefined)
    {
        btn.disabled = false;
    } else {
        btn.disabled = true;
    }
}

/**
 * return to home page in current tab
 */
function goHome()
{
    window.open("../index.html", "_self");
}