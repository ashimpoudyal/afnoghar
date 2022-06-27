<aside class="app-sidebar">
                    <div class="app-sidebar__logo">
                        <a class="header-brand" href="{{route('adminDashboard')}}">
                            <img src="{{ asset('public/uploads/theme'.$theme->logo) }}" class="header-brand-img desktop-lgo" alt="Azea logo">
                            <img src="assets/images/brand/logo1.png" class="header-brand-img dark-logo" alt="Azea logo">
                            <img src="{{ asset('public/uploads/theme'.$theme->favicon) }}" class="header-brand-img mobile-logo" alt="Azea logo">
                            <img src="assets/images/brand/favicon1.png" class="header-brand-img darkmobile-logo" alt="Azea logo">
                        </a>
                    </div>
                    <ul class="side-menu app-sidebar3">
                        <li class="side-item side-item-category">Main</li>
                        <li class="slide">
                            <a class="side-menu__item"  href="{{route('adminDashboard')}}">
                                <svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707l-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13zm7 7v-5h4v5h-4zm2-15.586 6 6V15l.001 5H16v-5c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H6v-9.586l6-6z"/></svg>
                            <span class="side-menu__label">Dashboard</span></a>
                        </li>





                         <li class="side-item side-item-category">Room Management </li>
                        
                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M13 4H6v16h12V9h-5V4zm3 14H8v-2h8v2zm0-6v2H8v-2h8z" opacity=".3"></path><path d="M8 16h8v2H8zm0-4h8v2H8zm6-10H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"></path></svg>
                            <span class="side-menu__label"> Room Category</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="{{route('roomcategory.index')}}" class="slide-item"> View </a></li>
                                <li><a href="{{route('roomcategory.add')}}" class="slide-item"> Add </a></li>
                            </ul>
                        </li>



                         <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M13 4H6v16h12V9h-5V4zm3 14H8v-2h8v2zm0-6v2H8v-2h8z" opacity=".3"></path><path d="M8 16h8v2H8zm0-4h8v2H8zm6-10H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"></path></svg>
                            <span class="side-menu__label"> Room </span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="{{route('room.index')}}" class="slide-item"> View </a></li>
                                <li><a href="{{route('room.add')}}" class="slide-item"> Add </a></li>
                            </ul>
                        </li>





                         <li class="side-item side-item-category">Booking Management </li>
                        
                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M13 4H6v16h12V9h-5V4zm3 14H8v-2h8v2zm0-6v2H8v-2h8z" opacity=".3"></path><path d="M8 16h8v2H8zm0-4h8v2H8zm6-10H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"></path></svg>
                            <span class="side-menu__label"> Booking</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="{{route('booking.index')}}" class="slide-item"> View </a></li>
                                <li><a href="{{route('booking.add')}}" class="slide-item"> Add </a></li>
                            </ul>
                        </li>





                         <li class="side-item side-item-category">Menu Management</li>
                         <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M13 4H6v16h12V9h-5V4zm3 14H8v-2h8v2zm0-6v2H8v-2h8z" opacity=".3"></path><path d="M8 16h8v2H8zm0-4h8v2H8zm6-10H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"></path></svg>
                            <span class="side-menu__label"> Menu Category</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="{{route('menucategory.index')}}" class="slide-item"> View </a></li>
                                <li><a href="{{route('menucategory.add')}}" class="slide-item"> Add </a></li>
                            </ul>
                        </li>
                        
                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M13 4H6v16h12V9h-5V4zm3 14H8v-2h8v2zm0-6v2H8v-2h8z" opacity=".3"></path><path d="M8 16h8v2H8zm0-4h8v2H8zm6-10H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"></path></svg>
                            <span class="side-menu__label"> Menu</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="{{route('menu.index')}}" class="slide-item"> View </a></li>
                                <li><a href="{{route('menu.add')}}" class="slide-item"> Add </a></li>
                            </ul>
                        </li>


                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M6.5 10h-2v7h2v-7zm6 0h-2v7h2v-7zm8.5 9H2v2h19v-2zm-2.5-9h-2v7h2v-7zm-7-6.74L16.71 6H6.29l5.21-2.74m0-2.26L2 6v2h19V6l-9.5-5z"></path></svg>
                            <span class="side-menu__label">Coupons </span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="{{route('coupon.index')}}" class="slide-item"> View  </a></li>
                                <li><a href="{{route('coupon.add')}}" class="slide-item"> Add </a></li>
                            </ul>
                        </li>



                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M6.5 10h-2v7h2v-7zm6 0h-2v7h2v-7zm8.5 9H2v2h19v-2zm-2.5-9h-2v7h2v-7zm-7-6.74L16.71 6H6.29l5.21-2.74m0-2.26L2 6v2h19V6l-9.5-5z"></path></svg>
                            <span class="side-menu__label">Order </span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="{{route('order.index')}}" class="slide-item"> View  </a></li>
                                <li><a href="{{route('order.add')}}" class="slide-item"> Add </a></li>
                            </ul>
                        </li>












                            <li class="side-item side-item-category">Blog Management </li>
                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M13 4H6v16h12V9h-5V4zm3 14H8v-2h8v2zm0-6v2H8v-2h8z" opacity=".3"></path><path d="M8 16h8v2H8zm0-4h8v2H8zm6-10H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"></path></svg>
                            <span class="side-menu__label"> Blog Category</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="{{route('blogcategory.index')}}" class="slide-item"> View </a></li>
                                <li><a href="{{route('blogcategory.add')}}" class="slide-item"> Add </a></li>
                            </ul>
                        </li>

                         <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M19 18l2 1V3c0-1.1-.9-2-2-2H8.99C7.89 1 7 1.9 7 3h10c1.1 0 2 .9 2 2v13zM15 5H5c-1.1 0-2 .9-2 2v16l7-3 7 3V7c0-1.1-.9-2-2-2z"></path></svg>
                            <span class="side-menu__label">Tag</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="{{route('tag.index')}}" class="slide-item"> View</a></li>
                                <li><a href="{{route('tag.add')}}" class="slide-item"> Add</a></li>
                            </ul>
                        </li>


                         <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M20 4H4v13.17L5.17 16H20V4zm-6 10H6v-2h8v2zm4-3H6V9h12v2zm0-3H6V6h12v2z" opacity=".3"></path><path d="M20 18c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14zm-16-.83V4h16v12H5.17L4 17.17zM6 12h8v2H6zm0-3h12v2H6zm0-3h12v2H6z"></path></svg>
                            <span class="side-menu__label">Blog Post</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="{{route('post.index')}}" class="slide-item"> View</a></li>
                                <li><a href="{{route('post.add')}}" class="slide-item"> Add</a></li>
                            </ul>
                        </li>


                         <li class="side-item side-item-category">Notice Management </li>
                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M20 16V6H4v10.01L20 16zm-7-1.53v-2.19c-2.78 0-4.61.85-6 2.72.56-2.67 2.11-5.33 6-5.87V7l4 3.73-4 3.74z" opacity=".3"></path><path d="M20 18c1.1 0 1.99-.9 1.99-2L22 6c0-1.11-.9-2-2-2H4c-1.11 0-2 .89-2 2v10c0 1.1.89 2 2 2H0v2h24v-2h-4zM4 16V6h16v10.01L4 16zm9-6.87c-3.89.54-5.44 3.2-6 5.87 1.39-1.87 3.22-2.72 6-2.72v2.19l4-3.74L13 7v2.13z"></path></svg>
                            <span class="side-menu__label">Notice</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="{{route('notice.index')}}" class="slide-item"> View  </a></li>
                                <li><a href="{{route('notice.add')}}" class="slide-item"> Add </a></li>
                            </ul>
                        </li>



                          <li class="side-item side-item-category">Event Management </li>



                           <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M13 4H6v16h12V9h-5V4zm3 14H8v-2h8v2zm0-6v2H8v-2h8z" opacity=".3"></path><path d="M8 16h8v2H8zm0-4h8v2H8zm6-10H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"></path></svg>
                            <span class="side-menu__label"> Event Category</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="{{route('eventcategory.index')}}" class="slide-item"> View </a></li>
                                <li><a href="{{route('eventcategory.add')}}" class="slide-item"> Add </a></li>
                            </ul>
                        </li>


                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M18.49 9.89l.26-2.79-2.74-.62-1.43-2.41L12 5.18 9.42 4.07 7.99 6.48l-2.74.62.26 2.78L3.66 12l1.85 2.11-.26 2.8 2.74.62 1.43 2.41L12 18.82l2.58 1.11 1.43-2.41 2.74-.62-.26-2.79L20.34 12l-1.85-2.11zM13 17h-2v-2h2v2zm0-4h-2V7h2v6z" opacity=".3"></path><path d="M20.9 5.54l-3.61-.82-1.89-3.18L12 3 8.6 1.54 6.71 4.72l-3.61.81.34 3.68L1 12l2.44 2.78-.34 3.69 3.61.82 1.89 3.18L12 21l3.4 1.46 1.89-3.18 3.61-.82-.34-3.68L23 12l-2.44-2.78.34-3.68zM18.75 16.9l-2.74.62-1.43 2.41L12 18.82l-2.58 1.11-1.43-2.41-2.74-.62.26-2.8L3.66 12l1.85-2.12-.26-2.78 2.74-.61 1.43-2.41L12 5.18l2.58-1.11 1.43 2.41 2.74.62-.26 2.79L20.34 12l-1.85 2.11.26 2.79zM11 15h2v2h-2zm0-8h2v6h-2z"></path></svg>
                            <span class="side-menu__label">Event</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="{{route('event.index')}}" class="slide-item"> View  </a></li>
                                <li><a href="{{route('event.add')}}" class="slide-item"> Add </a></li>
                            </ul>
                        </li>






                            <li class="side-item side-item-category">Video Management </li>
                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M13 4H6v16h12V9h-5V4zm3 14H8v-2h8v2zm0-6v2H8v-2h8z" opacity=".3"></path><path d="M8 16h8v2H8zm0-4h8v2H8zm6-10H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"></path></svg>
                            <span class="side-menu__label">Video</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                 <li><a href="{{route('video.index')}}" class="slide-item"> View</a></li>
                                <li><a href="{{route('video.add')}}" class="slide-item"> Add</a></li>
                            </ul>
                        </li>

                     



                         

                                               @php 
                                               $current_user=Auth::guard('admin') ->user();
                                               $user_id=$current_user->id;
                                                $admin=App\Models\Admin::where('id', $user_id)->first(); 

                                                @endphp

                                                @if($admin->role_id==1)
                         <li class="side-item side-item-category">User Management </li>
                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M15 16c-2.69 0-5.77 1.28-6 2h12c-.2-.71-3.3-2-6-2z" opacity=".3"></path><circle cx="15" cy="8" opacity=".3" r="2"></circle><path d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm0 8c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4zm-6 4c.22-.72 3.31-2 6-2 2.7 0 5.8 1.29 6 2H9zm-3-3v-3h3v-2H6V7H4v3H1v2h3v3z"></path></svg>
                            <span class="side-menu__label">Staffs Management</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="{{route('admin.index')}}" class="slide-item"> View  </a></li>
                                <li><a href="{{route('admin.add')}}" class="slide-item"> Add </a></li>
                            </ul>
                        </li>
                        @else 

                        @endif



                        


                         

                        <li class="side-item side-item-category">Website Management</li>


                           <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path clip-rule="evenodd" d="M0 0h24v24H0z" fill="none"></path><path d="M22.7 19l-9.1-9.1c.9-2.3.4-5-1.5-6.9-2-2-5-2.4-7.4-1.3L9 6 6 9 1.6 4.7C.4 7.1.9 10.1 2.9 12.1c1.9 1.9 4.6 2.4 6.9 1.5l9.1 9.1c.4.4 1 .4 1.4 0l2.3-2.3c.5-.4.5-1.1.1-1.4z"></path></svg>
                            <span class="side-menu__label">Basic Setting</span><i class="angle fe fe-chevron-right"></i></a>
                            
                            <ul class="slide-menu">
                                <li><a href="{{route('theme')}}" class="slide-item"> Setting</a></li>
                            </ul>
                        </li>


                         <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M12 10l-.94 2.06L9 13l2.06.94L12 16l.94-2.06L15 13l-2.06-.94zm8-5h-3.17L15 3H9L7.17 5H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 14H4V7h4.05l.59-.65L9.88 5h4.24l1.24 1.35.59.65H20v12zM12 8c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5zm0 8c-1.65 0-3-1.35-3-3s1.35-3 3-3 3 1.35 3 3-1.35 3-3 3z"></path></svg>
                            <span class="side-menu__label">Banner</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="{{route('banner.index')}}" class="slide-item"> View</a></li>
                                <li><a href="{{route('banner.add')}}" class="slide-item"> Add</a></li>
                            </ul>
                        </li>



                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M12 4c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm3.5 4c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5zm-7 0c.83 0 1.5.67 1.5 1.5S9.33 11 8.5 11 7 10.33 7 9.5 7.67 8 8.5 8zm3.5 9.5c-2.33 0-4.32-1.45-5.12-3.5h1.67c.7 1.19 1.97 2 3.45 2s2.76-.81 3.45-2h1.67c-.8 2.05-2.79 3.5-5.12 3.5z" opacity=".3"></path><circle cx="15.5" cy="9.5" r="1.5"></circle><circle cx="8.5" cy="9.5" r="1.5"></circle><path d="M12 16c-1.48 0-2.75-.81-3.45-2H6.88c.8 2.05 2.79 3.5 5.12 3.5s4.32-1.45 5.12-3.5h-1.67c-.69 1.19-1.97 2-3.45 2zm-.01-14C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"></path></svg>
                            <span class="side-menu__label">Testimonial</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="{{route('testimonial.index')}}" class="slide-item"> View </a></li>
                                <li><a href="{{route('testimonial.add')}}" class="slide-item"> Add </a></li>
                            </ul>
                        </li>


                         <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><circle cx="11" cy="8" opacity=".3" r="2"></circle><path d="M5 18h4.99L9 17l.93-.94C7.55 16.33 5.2 17.37 5 18z" opacity=".3"></path><path d="M11 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm-1 12H5c.2-.63 2.55-1.67 4.93-1.94h.03l.46-.45L12 14.06c-.39-.04-.68-.06-1-.06-2.67 0-8 1.34-8 4v2h9l-2-2zm10.6-5.5l-5.13 5.17-2.07-2.08L12 17l3.47 3.5L22 13.91z"></path></svg>
                            <span class="side-menu__label">Our Team</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="{{route('team.index')}}" class="slide-item"> View </a></li>
                                <li><a href="{{route('team.add')}}" class="slide-item"> Add </a></li>
                            </ul>
                        </li>


                         <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M20 17V7c0-2.168-3.663-4-8-4S4 4.832 4 7v10c0 2.168 3.663 4 8 4s8-1.832 8-4zM12 5c3.691 0 5.931 1.507 6 1.994C17.931 7.493 15.691 9 12 9S6.069 7.493 6 7.006C6.069 6.507 8.309 5 12 5zM6 9.607C7.479 10.454 9.637 11 12 11s4.521-.546 6-1.393v2.387c-.069.499-2.309 2.006-6 2.006s-5.931-1.507-6-2V9.607zM6 17v-2.393C7.479 15.454 9.637 16 12 16s4.521-.546 6-1.393v2.387c-.069.499-2.309 2.006-6 2.006s-5.931-1.507-6-2z"/></svg>
                            <span class="side-menu__label">Our Services</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="{{route('service.index')}}" class="slide-item"> View </a></li>
                                <li><a href="{{route('service.add')}}" class="slide-item"> Add </a></li>
                            </ul>
                        </li>


                           <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M20 17V7c0-2.168-3.663-4-8-4S4 4.832 4 7v10c0 2.168 3.663 4 8 4s8-1.832 8-4zM12 5c3.691 0 5.931 1.507 6 1.994C17.931 7.493 15.691 9 12 9S6.069 7.493 6 7.006C6.069 6.507 8.309 5 12 5zM6 9.607C7.479 10.454 9.637 11 12 11s4.521-.546 6-1.393v2.387c-.069.499-2.309 2.006-6 2.006s-5.931-1.507-6-2V9.607zM6 17v-2.393C7.479 15.454 9.637 16 12 16s4.521-.546 6-1.393v2.387c-.069.499-2.309 2.006-6 2.006s-5.931-1.507-6-2z"/></svg>
                            <span class="side-menu__label">Offer</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="{{route('offer.index')}}" class="slide-item"> View </a></li>
                                <li><a href="{{route('offer.add')}}" class="slide-item"> Add </a></li>
                            </ul>
                        </li>





                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M12 10l-.94 2.06L9 13l2.06.94L12 16l.94-2.06L15 13l-2.06-.94zm8-5h-3.17L15 3H9L7.17 5H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 14H4V7h4.05l.59-.65L9.88 5h4.24l1.24 1.35.59.65H20v12zM12 8c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5zm0 8c-1.65 0-3-1.35-3-3s1.35-3 3-3 3 1.35 3 3-1.35 3-3 3z"></path></svg>
                            <span class="side-menu__label">Gallery</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="{{route('gallery.index')}}" class="slide-item"> View</a></li>
                                <li><a href="{{route('gallery.add')}}" class="slide-item"> Add</a></li>
                            </ul>
                        </li>





                         <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M20 17V7c0-2.168-3.663-4-8-4S4 4.832 4 7v10c0 2.168 3.663 4 8 4s8-1.832 8-4zM12 5c3.691 0 5.931 1.507 6 1.994C17.931 7.493 15.691 9 12 9S6.069 7.493 6 7.006C6.069 6.507 8.309 5 12 5zM6 9.607C7.479 10.454 9.637 11 12 11s4.521-.546 6-1.393v2.387c-.069.499-2.309 2.006-6 2.006s-5.931-1.507-6-2V9.607zM6 17v-2.393C7.479 15.454 9.637 16 12 16s4.521-.546 6-1.393v2.387c-.069.499-2.309 2.006-6 2.006s-5.931-1.507-6-2z"/></svg>
                            <span class="side-menu__label">Facilities</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="{{route('facility.index')}}" class="slide-item"> View </a></li>
                                <li><a href="{{route('facility.add')}}" class="slide-item"> Add </a></li>
                            </ul>
                        </li>




                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M20 17V7c0-2.168-3.663-4-8-4S4 4.832 4 7v10c0 2.168 3.663 4 8 4s8-1.832 8-4zM12 5c3.691 0 5.931 1.507 6 1.994C17.931 7.493 15.691 9 12 9S6.069 7.493 6 7.006C6.069 6.507 8.309 5 12 5zM6 9.607C7.479 10.454 9.637 11 12 11s4.521-.546 6-1.393v2.387c-.069.499-2.309 2.006-6 2.006s-5.931-1.507-6-2V9.607zM6 17v-2.393C7.479 15.454 9.637 16 12 16s4.521-.546 6-1.393v2.387c-.069.499-2.309 2.006-6 2.006s-5.931-1.507-6-2z"/></svg>
                            <span class="side-menu__label">Amenities</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="{{route('amenities.index')}}" class="slide-item"> View </a></li>
                                <li><a href="{{route('amenities.add')}}" class="slide-item"> Add </a></li>
                            </ul>
                        </li>






                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM9 9H5V5h4v4zm11-6h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zm-1 6h-4V5h4v4zm-9 4H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1zm-1 6H5v-4h4v4zm8-6c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z"/></svg>
                            <span class="side-menu__label">Our Partner</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="{{route('partner.index')}}" class="slide-item"> View </a></li>
                                <li><a href="{{route('partner.add')}}" class="slide-item"> Add </a></li>
                            </ul>
                        </li>




                       

                      


                        
                        
                        
                    </ul>
                </aside>