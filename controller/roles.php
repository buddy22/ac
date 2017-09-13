<?php
/*PHP Dynamic and Recursive Menu System

When building the dynamic menu at my previous job, for our CMS, we had one class that dynamicly builds/prints the menu based on the menu object.

View output example of the code below

Since you're kind of new, I don't suggest making any overkill menu, but try to keep it as simple as possible.

I suggest making a class for the menu, where you send/store the menu array. This way you can make other objects unlock/lock different menu objects, or even send a sub-menu to that menu class (depending on how complex you want to make it).

This allows you to dynamicly build the menu as you run through the system code, and print the menu when your code is finished running. That way you can put the user based menu items in each section of the code, which handles that part.

For example, when running the system, make a function/method that checks the user access and for simple solutions, have hard-coded arrays with menu objects for each user access, or if going hardcore, build the menu arrays dynamicly. That's up to you.*/

// Let's create the child menu array for the "Home" menu structure
$home[] = array('TITLE' => 'Home 1',
                'URL' => '/home-1-url-here',
                'CSS_CLASS' => 'sub-menu',
                'CHILDREN' => $home1Child);

$home[] = array('TITLE' => 'Home 2',
                'URL' => '/home-2-url-here',
                'CSS_CLASS' => 'sub-menu');

// Now we create the whole home array, with the children
$homeMenu = array('CSS_CLASS' => 'top-css-class',
                 'TITLE' => 'Home',
                 // If the top menu item is just a link, specify an URL
                 'URL' => '', 
                 // Or if it has children pass them on
                 'CHILDREN' => $home);

// Let's create the child menu array for the "Gallery" menu structure
$gallery[] = array('TITLE' => 'Gallery 1',
                'URL' => '/gallery-1-url-here',
                'CSS_CLASS' => 'sub-menu');

$gallery2Child[] = array('TITLE' => 'Gallery 2.1',
                'URL' => '/gallery-2.1-url-here',
                'CSS_CLASS' => 'sub-menu-child');
$gallery2Child[] = array('TITLE' => 'Gallery 2.2',
                'URL' => '/gallery-2.2-url-here',
                'CSS_CLASS' => 'sub-menu-child');

$gallery[] = array('TITLE' => 'Gallery 2',
                'URL' => '/gallery-2-url-here',
                'CSS_CLASS' => 'sub-menu',
                'CHILDREN' => $gallery2Child);

// Now we create the whole gallery array, with the children
$galleryMenu = array('CSS_CLASS' => 'top-css-class',
                 'TITLE' => 'Gallery',
                 // If the top menu item is just a link, specify an URL
                 'URL' => '', 
                 // Or if it has children pass them on
                 'CHILDREN' => $gallery);

$menu = new menu;
// Store the menu items we want in the menu
$menu->storeItem($homeMenu);
$menu->storeItem($galleryMenu);
// Print the menu
echo $menu->buildMenu();

//If you want to make sub-menus aswell, make the menu class work recursively.

class menu {
   private $mainMenuClass = 'main-menu-class';
   private $parentClass = 'parent-menu-class';
   private $menu;

   public function storeItem($menuItem, $parentClass = '') { // If no $parentClass is specified, pick the default one
      // This stores the menu in an array
      $this->menu[] = $menuItem;
   }

   public function buildMenu() {
      // Let's break down the menu array, and start building it
      $html = '<ul class="'. $this->mainMenuClass .'">'. PHP_EOL;
      foreach($this->menu as $parentClass => $item) {
         $html .= '<li class="'. $item['CSS_CLASS'] .'"><a href="'. $item['URL'] .'">'. $item['TITLE'] .'</a>'. PHP_EOL;
         // Check if it's a recursive sub-menu (with children)
         // Now we send the children array to the buildChildrenItems() method
         $html .= $this->buildChildrenItems($item['CHILDREN']);
         $html .= '</li>'. PHP_EOL;
      }
      $html .= '</ul>'. PHP_EOL;
   return $html;
   }

   public function buildChildrenItems($menuSection) {
      // Put the recursive logics here so we can keep looping
      $html = '<ul class="'. $this->parentClass .'">'. PHP_EOL;
      foreach($menuSection as $item) {
          $html .= '<li class="'. $item['CSS_CLASS'] .'"><a href="'. $item['URL'] .'">'. $item['TITLE'] .'</a>'. PHP_EOL;
          // Now here is where the recursive magic happends
          // If the child item has even more children, call this method once again for those children
          $html .= ( isset($item['CHILDREN']) && is_array($item['CHILDREN']) ) ? $this->buildChildrenItems($item['CHILDREN']) : ''; 
          $html .= '</li>'. PHP_EOL;
      }
      $html .= '</ul>'. PHP_EOL;
   return $html;
   }
}


//From here you just design the menu as you want, using the CSS classes.

//If you want to make it recursive (with dynamic sub-menus), then simply make the recursive logics before calling the buildChildrenItems() method. This is included in the code example above.

//For more complex recursive menus, try these arrays.

$home1Child[] = array('TITLE' => 'Home 1.1',
                'URL' => '/home-1.1-url-here',
                'CSS_CLASS' => 'sub-menu-child');

$home121Child[] = array('TITLE' => 'Home 1.2.1',
                    'URL' => '/home-1.2.1-url-here',
                    'CSS_CLASS' => 'sub-menu-child');

    $home121Child[] = array('TITLE' => 'Home 1.2.2',
                    'URL' => '/home-1.2.2-url-here',
                    'CSS_CLASS' => 'sub-menu-child');

$home1Child[] = array('TITLE' => 'Home 1.2',
                'URL' => '/home-1.2-url-here',
                'CSS_CLASS' => 'sub-menu-child',
                'CHILDREN' => $home121Child);

$home1Child[] = array('TITLE' => 'Home 1.3',
                'URL' => '/home-1.3-url-here',
                'CSS_CLASS' => 'sub-menu-child');

$home[] = array('TITLE' => 'Home 1',
                'URL' => '/home-1-url-here',
                'CSS_CLASS' => 'sub-menu',
                'CHILDREN' => $home1Child);

$home[] = array('TITLE' => 'Home 2',
                'URL' => '/home-2-url-here',
                'CSS_CLASS' => 'sub-menu');

$home[] = array('TITLE' => 'Home 3',
                'URL' => '/home-3-url-here',
                'CSS_CLASS' => 'sub-menu');

// Now we create the whole home array, with the children

$homeMenu = array('CSS_CLASS' => 'top-css-class',
                 'TITLE' => 'Home',
                 // If the top menu item is just a link, specify an URL
                 'URL' => '', 
                 // Or if it has children pass them on
                 'CHILDREN' => $home);

// Let's create the child menu array for the "Gallery" menu structure
$gallery[] = array('TITLE' => 'Gallery 1',
                'URL' => '/gallery-1-url-here',
                'CSS_CLASS' => 'sub-menu');

$gallery2Child[] = array('TITLE' => 'Gallery 2.1',
                'URL' => '/gallery-2.1-url-here',
                'CSS_CLASS' => 'sub-menu-child');
$gallery2Child[] = array('TITLE' => 'Gallery 2.2',
                'URL' => '/gallery-2.2-url-here',
                'CSS_CLASS' => 'sub-menu-child');

$gallery[] = array('TITLE' => 'Gallery 2',
                'URL' => '/gallery-2-url-here',
                'CSS_CLASS' => 'sub-menu',
                'CHILDREN' => $gallery2Child);

// Now we create the whole gallery array, with the children
$galleryMenu = array('CSS_CLASS' => 'top-css-class',
                 'TITLE' => 'Gallery',
                 // If the top menu item is just a link, specify an URL
                 'URL' => '', 
                 // Or if it has children pass them on
                 'CHILDREN' => $gallery);
//View output example of the code above

/*Finally, in the different classes for example, let's say the Gallery. Create the gallery menu array, check what kind of access the user has, and build it properly. Then you send the gallery menu array to the menu class, as shown above.

This concept is also good for future expansions, so when adding a new class/section on the website, let's say a guestbook. All the menu logics are built in that class and just sent to the dynamic menu class which builds it.

I do not recommend putting all the menu logics inside one big menu file, but as you run the system code, process each section and build the menu object as you go.

Hope this helps you on your way!

PS. If you have alot of user access types, and want to keep a clean code, put the menu arrays for each user access in seperate php files. (user_type_member.php or user_type_admin.php).

In the php code, where the arrays are written, just make a user type check, and call the according php file to load the array for that user.
*/
switch($userType) {
   default: 
   case 'visitor': include('user_type_visitor.php'); break;
   case 'member': include('user_type_member.php'); break;
   case 'admin': include('user_type_admin.php'); break;
}
?>
