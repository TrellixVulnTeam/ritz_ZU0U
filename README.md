# Access 
User: bjornazzopardi@gmail.com
Pass: Think32!

## Run project
To run project you need:
1)  Download theme `ritz`
2)  Install wordpress and add `ritz` theme to `wp-content/themes`
3)  Open ritz project directory and write terminal `gulp`
4)  Admin access page is domain-name/wp-admin And enter admin login  `bjornazzopardi@gmail.com` and pass `Think32!` 
## Database 
U can install dev Database from  `Database` folder and import it to your localhost

## Dev problems
- Some images not being attached to task (Some Icons, and Product and Posts images) so for that reason most images are bad quality because it is screenshots.
- Woocommerce variable swatches not being created

## Task Description
> The task is to create part of a responsive Wordpress site using a custom theme. You must implement the design for the specified pages with the functionality described below, to the best of your ability.
> Make sure to read this document completely before attempting development.
> The design may be found by following the linked below:
> - Mobile Version: [https://thinkmt.invisionapp.com/console/share/RT6V5HJNBW4](https://thinkmt.invisionapp.com/console/share/RT6V5HJNBW4) 
> - Desktop Version: [https://thinkmt.invisionapp.com/console/share/EJGKBX3T5NY](https://thinkmt.invisionapp.com/console/share/EJGKBX3T5NY)
> User: `bjornazzopardi@gmail.com` 
> Pass: `Think32!`
> All assets may be retrieved from the attached folder, if you are unable to locate an asset you may replace it with a similar asset or a placeholder.
> It is important to attempt as many of the below tasks as possible. If you find any questions or difficulties don’t hesitate to contact us.

### Design
On opening the invision link you will see the required website design along with a navigation bar. Select the arrow to expand all available screens. The screens you will be working on are defined in the Development section.

The design is based on the Bootstrap ([https://getbootstrap.com/](https://getbootstrap.com/)) framework, your code should also implement this framework. Selecting the ‘< />’ icon will take you to the inspect page for the current screen where you will be able to see the page structure with respect to the bootstrap columns. 

Clicking on any element on the page will give you further information (size, font, colour etc) on the right side of the screen.

Included above is a design for the home page on mobile. Keep in mind that the elements should be responsive to screen size, this means that dynamic structures and values should be used. e.g. bootstrap columns. For pages or elements that do not have a mobile version feel free to make responsive as you see fit.
 
### Development
#### General
- You must create your own custom theme for the project on a clean wordpress installation.

- Your work must be tracked in a public git repository such as github or gitlab.
- Correct programming techniques such as reusability of code must be observed.
- You should use SASS/SCSS ([https://sass-lang.com/](https://sass-lang.com/)) for styling using a compiler such as Gulp.js (https://gulpjs.com/) or any other similar.
- All buttons, links & forms functionality may be ignored unless specified in the following sections, however these must still be included in your HTML and styled accordingly.
- Plugins such as ACF ([https://www.advancedcustomfields.com/](https://www.advancedcustomfields.com/)) or similar may be used to assist development.
- The Wordpress Admin (/wp-admin) must be kept simple and easy to use by the website administrator.
- You must use Woocommerce ([https://woocommerce.com/](https://woocommerce.com/)) for the store functionality. The screens you will be developing are: Home & product page
Data
- Products: Create a total of 6 dummy products, these must include the ones visible in the design, the remaining can be duplicates. (further details below)
- Product Categories: Kayaks, Marine, Jetsurf, Racks Product Attributes: Colour, Construction
- Kayaks Subcategories: Sea Kayaks, Inflatable Kayaks, Fishing, Sit on Top, Kids (ignore the other sub-menu items in the design)
- Product Tags: New
- Blog Posts: Create a total of 4 dummy posts, these must include the ones visible in the
design, the remaining can be duplicates. (Content can be lorem ipsum text) Blog Post Categories: Ritz, Kayaks, Marines
     
 ### Home
The navigation bar is made up of Product Categories and subcategories.
 The 4 main boxes are the main Product categories.
 
 The Top Categories section can be ignored from the design. Do not include this in your development.
 The ‘Our Favourites’ section will show top 5 products, selected by the admin from the wp-admin, in a carousel/slider.
Suggestion: You can use the ACF plugin here to allow the Admin to select their favourite products from the backend.
 
 The ‘Keep Updated’ section will show the latest X posts. The number will be set in a later task. Default value should be 3.
 The map section can be ignored. Do not include this in your development.
 
 ### Product Page
Anything Crossed of from the image below may be ignored during development.
 Custom fields
The products will have 2 custom fields which must be editable from the wp-admin within the product. These will also be displayed on the front end of the website.
- Product Type (free text)
- Points (integer)
Product Attributes
Products can have 2 types of attributes
- Colour (text in the backend, visible colour on the front end)
- Construction (text)
Suggestion: For the visible colour you can use hex codes stored in a custom field within the terms of the attributes.
Price
Products on sale will have the original price displayed beside the sale price.

 ### Features
Any of the fields below which are not part of native woocommerce must be created as custom fields within the product as free text fields.
Related Products
The related products section is also a carousel/slider but will show posts which are within the same Main category as the current post
  
 ### Admin
In the Wordpress Admin (/wp-admin).
Add a new section in the sidebar menu called ‘Post Settings’. This section will allow the administrator to edit the maximum number of posts shown on the home page. The fallback/default value should be as stated in the sections above. (Example below)
Add a new sub-menu item to the Posts section called ‘Count External Posts’. This section will communicate with this API (https://jsonplaceholder.typicode.com) to print the total number of posts hosted on their server. Use the ‘/posts’ endpoint to retrieve the data and perform any necessary calculations. The result of his API call must be printed in the ‘‘Count External Posts’’page.
In the posts page create a php function to display the view count of each post. Similar to the below example.
    
### Development Tools:
- Git
- Wordpress
- Bootstrap ([https://getbootstrap.com/](https://getbootstrap.com/)) 
- SASS/SCSS ([https://sass-lang.com/](https://sass-lang.com/)) 
- Gulp.js ([https://gulpjs.com/](https://gulpjs.com/))
- ACF ([https://www.advancedcustomfields.com/](https://www.advancedcustomfields.com/))
- Woocommerce

### Deliverables:
Provide source code in a public git repository such as github or gitlab along with any instructions needed to run it in the readme.md document.
     