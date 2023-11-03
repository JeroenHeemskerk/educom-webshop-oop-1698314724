<?php

require_once('controllers/page_controller.php');
//require_once('session-manager.php');
$controller = new PageController();
$controller->handleRequest();

//syntax voor aanroepen static method in een class
// if (!SessionManager::isCartInitialized()) {
//     SessionManager::isCartInitialized();
// }

// ===================================
// MAIN APP
// ===================================
// $page = getRequestedPage();
// Voer business logic (processRequest) uit en krijg juiste data voor pagina terug
// $pageData = processRequest($page);
// showResponsePage($pageData);


// function showResponsePage($pageData)
// {
//     $page = $pageData['page'];

//     switch ($page) {
//         case 'home':
//             require_once('views/home_doc.php');
//             $view = new HomeDoc($pageData);
//             $view->show();
//             break;
//         case 'about':
//             require_once('views/about_doc.php');
//             $view = new AboutDoc($pageData);
//             $view->show();
//             break;
//         case 'contact':
//             require_once('views/contact_doc.php');
//             $view = new ContactDoc($pageData);
//             $view->show();
//             break;
//         case 'register':
//             require_once('views/register_doc.php');
//             $view = new RegisterDoc($pageData);
//             $view->show();
//             break;
//         case 'login':
//             require_once('views/login_doc.php');
//             $view = new LoginDoc($pageData);
//             $view->show();
//             break;
//         case 'webshop':
//             require_once('views/webshop_doc.php');
//             $view = new WebshopDoc($pageData);
//             $view->show();
//             break;
//         case 'product':
//             require_once('views/product_doc.php');
//             $view = new ProductDoc($pageData);
//             $view->show();
//             break;
//         case 'shoppingcart':
//             require_once('views/shoppingcart_doc.php');
//             $view = new ShoppingcartDoc($pageData);
//             $view->show();
//             break;
//         default:
//             require_once('views/basic_doc.php');
//             $view = new BasicDoc($pageData);
//             $view->show();
//     }
// };

// // ===================================
// // FUNCTIONS
// // ===================================




// //input is de route
// function processRequest($page)
// {
//     $pageData = [];

//     switch ($page) {
//         case 'home':
//             $pageData['page'] = $page;
//             // ["page" => "home"]
//             break;
//         case 'about':
//             $pageData['page'] = $page;
//             break;
//         case 'login':
//             require_once('login.php');
//             $pageData = getLoginData();
//             // ["page" => "login", "email" => ""]
//             break;
//         case 'register':
//             require_once('register.php');
//             $pageData = doProcessRegisterRequest();
//             break;
//             // ["page" => "register", "email" => ""]
//             break;
//         case 'contact':
//             require_once('contact.php');
//             $pageData = getContactData();
//             // ["page" => "register", "email" => ""]
//             break;
//         case 'logout':
//             doLogOut();
//             $pageData['page'] = 'home';
//             break;
//         case 'webshop':
//             require_once('webshop.php');
//             require_once('product-service.php');
//             $pageData = initializeWebshopData();
//             $pageData = handleActions($pageData);
//             $pageData = getWebshopData($pageData);
//             break;
//         case 'product':
//             require_once('product.php');
//             require_once('product-service.php');
//             $pageData = initializeProductData();
//             $pageData = handleActions($pageData);
//             $pageData = getProductData($pageData);
//             break;
//         case 'shoppingcart':
//             require_once('shoppingcart.php');
//             require_once('product-service.php');
//             $pageData = initializeShoppingcartData();
//             $pageData = handleActions($pageData);
//             $pageData = getShoppingcartData($pageData);
//             break;
//         default:
//             $pageData['page'] = 'not found';
//     }
//     //webshop pagina toegevoegd
//     $pageData['menu'] = array('home' => 'HOME', 'about' => 'ABOUT', 'contact' => 'CONTACT', 'webshop' => 'WEBSHOP');
//     if (isUserLoggedIn()) {
//         $pageData['menu']['logout'] = "LOGOUT " . getLoggedInUserName();
//         $pageData['menu']['shoppingcart'] = "SHOPPINGCART";
//     } else {
//         $pageData['menu']['register'] = "REGISTER";
//         $pageData['menu']['login'] = "LOGIN";
//     }
//     return $pageData;
// }


// // =========================================== 
// function doProcessRegisterRequest()
// {
//     $registerData = getRegisterData();

//     if ($registerData['valid']) {

//         $email = $registerData['email'];
//         $name = $registerData['name'];
//         $password = $registerData['password'];

//         require_once('database-connection.php');
//         try {
//             saveUser($email, $name, $password);
//             require_once('login.php');
//             $registerData = getInitialLoginFormData();
//         } catch (Exception $e) {
//             logError("registration failed: " . $e->getMessage());
//             $registerData['genericErr'] = "Registreren is op dit moment niet mogelijk. Probeer het later nog eens.";
//         }
//     }
//     return $registerData;
// }

//===========================================




// ===================================================


// function showBodySection($pageData)
// {
//     echo '    <body>' . PHP_EOL;
//     showHeader($pageData['page']);
//     showMenu($pageData);
//     showGenericError($pageData);
//     showGenericMessage($pageData);
//     showContent($pageData);
//     showFooter();
//     echo '    </body>' . PHP_EOL;
// }


//============================================== 



// function showContent($pageData)
// {
//     $page = $pageData['page'];

//     switch ($page) {
//         case 'home':
//             require_once('home.php');
//             showHomeContent();
//             break;
//         case 'about':
//             require_once('about.php');
//             showAboutContent();
//             break;
//         case 'contact':
//             require_once('contact.php');
//             showContactContent($pageData);
//             break;
//         case 'register':
//             require_once('register.php');
//             showRegisterForm($pageData);
//             break;
//         case 'login':
//             require_once('login.php');
//             showLoginForm($pageData);
//             break;
//         case 'webshop':
//             require_once('webshop.php');
//             showWebshopContent($pageData);
//             break;
//         case 'product':
//             require_once('product.php');
//             showProductContent($pageData);
//             break;
//         case 'shoppingcart':
//             require_once('shoppingcart.php');
//             showShoppingCart($pageData);
//             break;
//         default:
//             //showPageNotFound();
//     }
// }



//============================================== 

//deze functie zit niet in mijn UI
function logError($message)
{
    echo "Logging to logfile: $message";
}
