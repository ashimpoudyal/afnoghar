<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoopeshController;
use Laravel\Socialite\Facades\Socialite;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Index page
Route::get('/', 'Front\IndexController@index')->name('index');
Route::get('/room','Front\FrontEndController@room')->name('room');
Route::get('/services','Front\FrontEndController@service')->name('service');
Route::get('/menu', 'Front\FrontEndController@menu')->name('menu');
Route::get('/event', 'Front\FrontEndController@event')->name('event');
Route::get('/amenities', 'Front\FrontEndController@amenities')->name('amenities');

// Room Details Page
Route::get('/room/{slug}', 'Front\FrontEndController@roomDetail')->name('roomDetail');


// Room Category Details Page
Route::get('/roomcategory/{slug}', 'Front\FrontEndController@roomcategoryDetail')->name('roomcategoryDetail');


// About page
Route::get('/about', 'Front\AboutController@about')->name('about');



// Blog page  
Route::get('/blog', 'Front\FrontEndController@post')->name('post');
Route::get('/blog/{slug}', 'Front\FrontEndController@postSingle')->name('postSingle');

Route::get('/menu/{slug}', 'Front\FrontEndController@menuSingle')->name('menuSingle');



//Room Page 
Route::get('/rooms', 'Front\FrontEndController@rooms')->name('rooms');


// //RoomGallery
// Route::get('/rooms/gallery','Front\FrontEndController@roomGallery')->name('roomGallery');

//Service Page 
Route::get('/services', 'Front\FrontEndController@service')->name('service');

// Service Details Page
Route::get('/services/{slug}', 'Front\FrontEndController@serviceDetail')->name('serviceDetail');




//About Page 
Route::get('/about', 'Front\FrontEndController@about')->name('about');





//Facility Page 
Route::get('/facility', 'Front\FrontEndController@facility')->name('facility');

Route::get('/facility/{slug}', 'Front\FrontEndController@facilitySingle')->name('facilitySingle');


Route::get('/checkout','Front\FrontEndController@checkout')->name('checkout');

Route::group(['middleware'=>  ['auth']],function(){ 

//Cart Details
Route::get('/cartdetails', 'Front\FrontEndController@cartDetails')->name('cartDetails');
});
//Checkout


// Add to Cart For Food

Route::match(['get','post'], '/add-cart', 'Front\FrontMenuController@addToCart')->name('addToCart');

//Update Cart
Route::match(['get','post'], '/update-cart', 'Front\FrontMenuController@updateCart')->name('updateCart');


//Cart Food
Route::match(['get','post'], '/cart', 'Front\FrontMenuController@cart')->name('cart');








// Delete Cart Items
Route::get('/cart/delete-product/{id}', 'Front\FrontMenuController@deleteCart')->name('deleteCart');


// Update Quantity in Cart
Route::get('/cart/update-quantity/{id}/{quantity}', 'Front\FrontMenuController@updateCartQuantity')->name('updateCartQuantity');




// Coupons
Route::post('apply_coupon_code', 'Front\FrontMenuController@apply_coupon_code');
Route::post('/cart/apply-coupon', 'Front\FrontMenuController@applyCoupon')->name('applyCoupon');
Route::post('remove_coupon_code', 'Front\FrontMenuController@remove_coupon_code')->name('removeCoupon');



// Amenities Page
Route::get('/amenities', 'Front\FrontEndController@amenities')->name('amenities');



// Contact Page
Route::get('/contact', 'Front\FrontEndController@contact')->name('contact');


Route::post('/contact', 'Front\FrontEndController@submitContactForm')->name('contact.submit');










// User   Page
Route::get('user/login', 'Front\LoginController@frontLogin')->name('frontLogin');
Route::post('user/login', 'Front\LoginController@loginUser')->name('loginUser');
Route::get('/user/logout', 'Front\LoginController@frontUserLogout')->name('frontUserLogout');
Route::get('user/register', 'Front\LoginController@userRegister')->name('userRegister');




// Register Page
Route::get('/user/register', 'Front\LoginController@register')->name('register');



// Register New user
Route::post('/user/register', 'Front\LoginController@registerUser')->name('registerUser');


// Confirm User
Route::get('/confirm/{code}', 'Front\LoginController@confirmAccount')->name('confirmAccount');








/** Google OAuth routes */
Route::get('/login/google', 'Front\LoginController@redirectToGoogle')->name('login.google');

Route::get('/login/google/callback', 'Front\LoginController@handleGoogleCallback')->name('handleGoogleCallback');





/** Facebook OAuth routes */
Route::get('/login/facebook', 'Front\LoginController@redirectToFacebook')->name('login.facebook');

Route::get('/login/facebook/callback', 'Front\LoginController@handleFacebookCallback')->name('handleFacebookCallback');










//Front Booking

Route::get('/user/booking', 'BookingController@frontbooking')->name('frontbooking');
Route::get('user/booking/available-rooms/{checkin_date}', 'BookingController@available_rooms')->name('available_rooms');
Route::post('user/booking/store', 'BookingController@store')->name('frontbooking.store');



// //Check out page with middleware
// Route::group(['middleware'=>  ['auth']],function(){ });
// //Checkout
// Route::match(['get','post'], '/checkout', 'Front\CheckoutController@checkout')->name('checkout');



// //checkout place orders
// Route::post('/place-order', 'Front\CheckoutController@storeorder')->name('place-order');


// // Route::post('/place-order', 'Front\CheckoutController@place_order')->name('place_order');






// });






// Event page
Route::get('/event', 'Front\FrontEndController@event')->name('event');

// Service Details Page
Route::get('/event/{slug}', 'Front\FrontEndController@eventDetail')->name('eventDetail');





Route::get('/room/discounts','Front\IndexController@roomDiscount')->name('roomDiscount');

















  

        Route::prefix('/admin')->group(function (){

   // Admin Login
   Route::match(['get', 'post'], '/login', 'AdminLoginController@adminLogin')->name('login');
    Route::match(['get', 'post'], '/login', 'AdminLoginController@adminLogin')->name('adminLogin');

	Route::group(['middleware' => ['admin']], function (){
     // Admin Dashboard
     Route::get('/dashboard', 'AdminLoginController@dashboard')->name('adminDashboard');
     // Admin ProfileAd
            Route::get('/profile', 'AdminProfileController@profile')->name('profile');

            // Admin EditProfile
            Route::get('/editprofile', 'AdminProfileController@editprofile')->name('editprofile');

            // Admin Update
            Route::post('/editprofile/update/{id}', 'AdminProfileController@updateProfile')->name('updateProfile');

            // Check Current Password
            Route::post('/editprofile/check-password', 'AdminProfileController@chkUserPassword')->name('chkUserPassword');
            // Update Admin Password
            Route::post('/editprofile/update_password/{id}', 'AdminProfileController@updatePassword')->name('updatePassword');







               //Room Category Routes
            Route::get('/roomcategory', 'RoomCategoryController@roomcategory')->name('roomcategory.index');
            Route::get('/roomcategory/add', 'RoomCategoryController@add')->name('roomcategory.add');
            Route::post('/roomcategory/store', 'RoomCategoryController@store')->name('roomcategory.store');
            Route::get('/roomcategory/edit/{id}', 'RoomCategoryController@edit')->name('roomcategory.edit');
             Route::post('/roomcategory/edit/{id}', 'RoomCategoryController@update')->name('roomcategory.update');
             Route::get('/delete-roomcategory/{id}', 'RoomCategoryController@delete')->name('roomcategory.delete');

             Route::match(['get', 'post'], '/room/gallery/{id}', 'RoomCategoryController@roomGallery')->name('roomGallery');

              Route::get('/delete-image/{id}', 'RoomCategoryController@deleteImage')->name('deleteImage');






           //Room  Routes
            Route::get('/room', 'RoomController@room')->name('room.index');
            Route::get('/room/add', 'RoomController@add')->name('room.add');
            Route::post('/room/store', 'RoomController@store')->name('room.store');
            Route::get('/room/edit/{id}', 'RoomController@edit')->name('room.edit');
             Route::post('/room/edit/{id}', 'RoomController@update')->name('room.update');
             Route::get('/delete-room/{id}', 'RoomController@delete')->name('room.delete');



             //Front Booking
             
             Route::get('/front/booking/{id}', 'Front\FrontEndController@addRoom')->name('front.booking.add');  
                Route::post('/front/booking/store', 'Front\FrontEndController@storeRoom')->name('front.booking.store');
                Route::get('/front/booking/edit/{id}', 'Front\FrontEndController@edit')->name('front.booking.edit');
                Route::get('/front/booking/edit/{id}', 'Front\FrontEndController@update')->name('front.booking.update');

               // Booking Routes
               Route::get('/booking', 'BookingController@booking')->name('booking.index');
                Route::get('/booking/add', 'BookingController@add')->name('booking.add');
                 Route::post('/booking/store', 'BookingController@store')->name('booking.store');
             Route::get('/booking/edit/{id}', 'BookingController@edit')->name('booking.edit');
             Route::post('/booking/edit/{id}', 'BookingController@update')->name('booking.update');
             Route::get('/delete-booking/{id}', 'BookingController@delete')->name('booking.delete');


              Route::get('/booking/available-rooms/{checkin_date}', 'BookingController@available_rooms')->name('available_rooms');


              //Menu Categories
               // Blog Category Routes
            Route::get('/menucategory', 'MenuCategoryController@menucategory')->name('menucategory.index');
            Route::get('/menucategory/add', 'MenuCategoryController@add')->name('menucategory.add');
            Route::post('/menucategory/store', 'MenuCategoryController@store')->name('menucategory.store');
            Route::get('/menucategory/edit/{id}', 'MenuCategoryController@edit')->name('menueditCategory');
            Route::post('/menucategory/edit/{id}', 'MenuCategoryController@update')->name('menuupdateCategory');
            Route::get('/delete-blogcategory/{id}', 'BlogCategoryController@deleteCategory')->name('deleteCategory');


              //Menu  Routes
            Route::get('/menu', 'MenuController@menu')->name('menu.index');
            Route::get('/menu/add', 'MenuController@add')->name('menu.add');
            Route::post('/menu/store', 'MenuController@store')->name('menu.store');
            Route::get('/menu/edit/{id}', 'MenuController@edit')->name('menu.edit');
             Route::post('/menu/edit/{id}', 'MenuController@update')->name('menu.update');
             Route::get('/delete-menu/{id}', 'MenuController@delete')->name('menu.delete');




               //Order  Routes
            Route::get('/order', 'OrderController@order')->name('order.index');
            Route::get('/order/add', 'OrderController@add')->name('order.add');
            Route::post('/order/store', 'OrderController@store')->name('order.store');
            Route::get('/order/edit/{id}', 'OrderController@edit')->name('order.edit');
             Route::get('/order/view/{id}', 'OrderController@view')->name('order.view');
             Route::post('/order/edit/{id}', 'OrderController@update')->name('order.update');
             Route::get('/delete-order/{id}', 'OrderController@delete')->name('order.delete');





             // Coupons
            Route::get('/coupons', 'CouponController@index')->name('coupon.index');
            Route::get('/coupon/add', 'CouponController@add')->name('coupon.add');
            Route::post('/coupon/store', 'CouponController@store')->name('coupon.store');
            Route::get('/coupon/edit/{id}', 'CouponController@edit')->name('coupon.edit');
            Route::post('/coupon/update/{id}', 'CouponController@update')->name('coupon.update');
            Route::get('/delete-coupon/{id}', 'CouponController@delete')->name('coupon.delete');


            //Checkout add
            Route::get('/checkout/add', 'Front\FrontEndController@checkoutAdd')->name('checkout.add');
            Route::post('/test', 'Front\FrontEndController@test')->name('test');

           
    


            // Blog Category Routes
            Route::get('/blogcategory', 'BlogCategoryController@blogcategory')->name('blogcategory.index');
            Route::get('/blogcategory/add', 'BlogCategoryController@add')->name('blogcategory.add');
            Route::post('/blogcategory/store', 'BlogCategoryController@store')->name('blogcategory.store');
            Route::get('/blogcategory/edit/{id}', 'BlogCategoryController@edit')->name('blogeditCategory');
             Route::post('/blogcategory/edit/{id}', 'BlogCategoryController@update')->name('blogupdateCategory');
             Route::get('/delete-blogcategory/{id}', 'BlogCategoryController@deleteCategory')->name('deleteCategory');



             // Tag Routes
            Route::get('/tag', 'TagController@tag')->name('tag.index');
            Route::get('/tag/add', 'TagController@add')->name('tag.add');
             Route::post('/tag/store', 'TagController@store')->name('tag.store');
             Route::get('/tag/edit/{id}', 'TagController@edit')->name('editTag');
             Route::post('/tag/edit/{id}', 'TagController@update')->name('updateTag');
             Route::get('/delete-tag/{id}', 'TagController@deleteCategory')->name('deleteTag');



             // Post  Routes
            Route::get('/post', 'PostController@tag')->name('post.index');
            Route::get('/post/add', 'PostController@add')->name('post.add');
             Route::post('/post/store', 'PostController@store')->name('post.store');
             Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');
             Route::post('/post/edit/{id}', 'PostController@update')->name('post.update');
             Route::get('/delete-post/{id}', 'PostController@delete')->name('post.delete');



             // Admin User Controller
            Route::get('/admins', 'AdminUserController@index')->name('admin.index');
            Route::get('/admins/add', 'AdminUserController@add')->name('admin.add');
            Route::post('/admins/store', 'AdminUserController@store')->name('admin.store');
            Route::get('/admins/edit/{id}', 'AdminUserController@edit')->name('admin.edit');
            Route::post('/admins/update/{id}', 'AdminUserController@update')->name('admin.update');
            Route::get('/delete-admins/{id}', 'AdminUserController@delete')->name('admin.delete');





             // Testimonials
            Route::get('/testimonial', 'TestimonialController@testimonial')->name('testimonial.index');
            Route::get('/testimonial/add', 'TestimonialController@addTestimonial')->name('testimonial.add');
            Route::post('/testimonial/store', 'TestimonialController@storeTestimonial')->name('testimonial.store');
            Route::get('/testimonial/edit/{id}', 'TestimonialController@editTestimonial')->name('testimonial.edit');
            Route::post('/testimonial/update/{id}', 'TestimonialController@updateTestimonial')->name('testimonial.update');
            Route::get('/delete-testimonial/{id}', 'TestimonialController@delete')->name('testimonial.delete');



              // Banner Routes
            Route::get('/banner', 'BannerController@banner')->name('banner.index');
            Route::get('/banner/add', 'BannerController@add')->name('banner.add');
             Route::post('/banner/store', 'BannerController@store')->name('banner.store');
             Route::get('/banner/edit/{id}', 'BannerController@edit')->name('editBanner');
             Route::post('/banner/edit/{id}', 'BannerController@update')->name('updateBanner');
             Route::get('/delete-banner/{id}', 'BannerController@deleteCategory')->name('deleteBanner');





                 // Video Routes
            Route::get('/video', 'VideoController@video')->name('video.index');
            Route::get('/video/add', 'VideoController@add')->name('video.add');
             Route::post('/video/store', 'VideoController@store')->name('video.store');
             Route::get('/video/edit/{id}', 'VideoController@edit')->name('editVideo');
             Route::post('/video/edit/{id}', 'VideoController@update')->name('updateVideo');
             Route::get('/delete-video/{id}', 'VideoController@delete')->name('deleteVideo');


            
               // Team Routes
            Route::get('/team', 'TeamController@team')->name('team.index');
            Route::get('/team/add', 'TeamController@add')->name('team.add');
             Route::post('/team/store', 'TeamController@store')->name('team.store');
             Route::get('/team/edit/{id}', 'TeamController@edit')->name('editTeam');
             Route::post('/team/edit/{id}', 'TeamController@update')->name('updateTeam');
             Route::get('/delete-team/{id}', 'TeamController@delete')->name('deleteTeam');




             // Notice Routes
            Route::get('/notice', 'NoticeController@notice')->name('notice.index');
            Route::get('/notice/add', 'NoticeController@add')->name('notice.add');
             Route::post('/notice/store', 'NoticeController@store')->name('notice.store');
             Route::get('/notice/edit/{id}', 'NoticeController@editnotice')->name('editNotice');
             Route::post('/notice/edit/{id}', 'NoticeController@update')->name('updateNotice');
             Route::get('/delete-notice/{id}', 'NoticeController@deleteNotice')->name('deleteNotice');




              // Event Category Routes
            Route::get('/eventcategory', 'EventCategoryController@eventcategory')->name('eventcategory.index');
            Route::get('/eventcategory/add', 'EventCategoryController@add')->name('eventcategory.add');
             Route::post('/eventcategory/store', 'EventCategoryController@store')->name('eventcategory.store');
             Route::get('/eventcategory/edit/{id}', 'EventCategoryController@editCategory')->name('editCategory');
             Route::post('/eventcategory/edit/{id}', 'EventCategoryController@update')->name('updateCategory');
             Route::get('/delete-eventcategory/{id}', 'EventCategoryController@deleteCategory')->name('deleteCategory');

             


            //Event Routes
            Route::get('/event', 'EventController@event')->name('event.index');
            Route::get('/event/add', 'EventController@add')->name('event.add');
             Route::post('/event/store', 'EventController@store')->name('event.store');
             Route::get('/event/edit/{id}', 'EventController@edit')->name('editEvent');
             Route::post('/event/edit/{id}', 'EventController@update')->name('updateEvent');
             Route::get('/delete-event/{id}', 'EventController@deleteEvent')->name('deleteEvent');


              Route::match(['get', 'post'], '/event/gallery/{id}', 'EventController@eventGallery')->name('eventGallery');

               Route::get('/delete-image/{id}', 'EventController@deleteImage')->name('deleteImage');





                   // Gallery Routes
            Route::get('/gallery', 'GalleryController@gallery')->name('gallery.index');
            Route::get('/gallery/add', 'GalleryController@add')->name('gallery.add');
             Route::post('/gallery/store', 'GalleryController@store')->name('gallery.store');
             Route::get('/gallery/edit/{id}', 'GalleryController@edit')->name('editGallery');
             Route::post('/gallery/edit/{id}', 'GalleryController@update')->name('updateGallery');
             Route::get('/delete-gallery/{id}', 'GalleryController@delete')->name('deleteGallery');




        


               // Service Routes
               Route::get('/service', 'OurServiceController@service')->name('service.index');
                Route::get('/service/add', 'OurServiceController@add')->name('service.add');
                 Route::post('/service/store', 'OurServiceController@store')->name('service.store');
             Route::get('/service/edit/{id}', 'OurServiceController@edit')->name('editService');
             Route::post('/service/edit/{id}', 'OurServiceController@update')->name('updateService');
             Route::get('/delete-service/{id}', 'OurServiceController@delete')->name('deleteService');






              // Facility Routes
               Route::get('/facility', 'FacilityController@facility')->name('facility.index');
                Route::get('/facility/add', 'FacilityController@add')->name('facility.add');
                 Route::post('/facility/store', 'FacilityController@store')->name('facility.store');
             Route::get('/facility/edit/{id}', 'FacilityController@edit')->name('editFacility');
             Route::post('/facility/edit/{id}', 'FacilityController@update')->name('updateFacility');
             Route::get('/delete-facility/{id}', 'FacilityController@delete')->name('deleteFacility');



              // Partner Routes
               Route::get('/partner', 'PartnerController@partner')->name('partner.index');
                Route::get('/partner/add', 'PartnerController@add')->name('partner.add');
                 Route::post('/partner/store', 'PartnerController@store')->name('partner.store');
             Route::get('/partner/edit/{id}', 'PartnerController@edit')->name('editPartner');
             Route::post('/partner/edit/{id}', 'PartnerController@update')->name('updatePartner');
             Route::get('/delete-partner/{id}', 'PartnerController@delete')->name('deletePartner');




             // Amenities Routes
               Route::get('/amenities', 'AmenitiesController@amenities')->name('amenities.index');
                Route::get('/amenities/add', 'AmenitiesController@add')->name('amenities.add');
                 Route::post('/amenities/store', 'AmenitiesController@store')->name('amenities.store');
             Route::get('/amenities/edit/{id}', 'AmenitiesController@edit')->name('ediAmenities');
             Route::post('/amenities/edit/{id}', 'AmenitiesController@update')->name('updatAmenities');
             Route::get('/delete-amenities/{id}', 'AmenitiesController@delete')->name('deletAmenities');




               // Amenities Routes
               Route::get('/offer', 'OfferController@offer')->name('offer.index');
                Route::get('/offer/add', 'OfferController@add')->name('offer.add');
                 Route::post('/offer/store', 'OfferController@store')->name('offer.store');
             Route::get('/offer/edit/{id}', 'OfferController@edit')->name('ediOffer');
             Route::post('/offer/edit/{id}', 'OfferController@update')->name('updatOffer');
             Route::get('/delete-offer/{id}', 'OfferController@delete')->name('deletOffer');




               








             // Theme Settings
            Route::get('/theme', 'ThemeController@theme')->name('theme');
            Route::post('/theme/{id}', 'ThemeController@themeUpdate')->name('themeUpdate');
             Route::post('/theme/aboutus/{id}', 'ThemeController@aboutus')->name('aboutus');
             Route::post('/theme/contactus/{id}', 'ThemeController@contactus')->name('contactus');






             





            
        });
});

        Route::post('/ckeditor', 'CkeditorFileUploadController@store')->name('ckeditor.upload');

        Route::get('/admin/logout', 'AdminLoginController@adminLogout')->name('adminLogout');

        Route::get('/front/about', 'Front\IndexController@about')->name('about');

        Route::get('/front/menu', 'Front\FrontEndController@menu')->name('menu');

        Route::get('/front/gallery', 'Front\IndexController@gallery')->name('gallery');

        Route::get('/front/reservation', 'Front\IndexController@reservation')->name('reservation');

        Route::get('/front/contact', 'Front\IndexController@contact')->name('contact');

        

