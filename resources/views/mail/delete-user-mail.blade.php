@component('mail::message')
<h4>Hello from our restaurant mail</h4>
<p>
We were happy to have you in our website. Hope to see you soon<!-- 
@component('mail::button', ['url' => 'http://127.0.0.1:8000/api/foods'])
Button Text
@endcomponent -->

Thanks,<br>
Ecommerce Restaurant
@endcomponent
