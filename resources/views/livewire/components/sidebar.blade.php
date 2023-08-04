<div class="py-4 flex flex-col space-y-7 pt-7 opacity-70">
  <div class="h-full items-center text-2xl font-extrabold justify-start flex">
    <img src="{{asset('images/laundry.png')}}" height="50" width="50" />
    <span x-show="sidebarOpen" class="hidden xl:block"> Laundry </span>
  </div>
  <a class="font-semibold flex flex-row justify-start items-center space-x-2 {{Request::is('dashboard')?'text-black shadow-2xl bg-slate-50 rounded-2xl p-2':''}}" href="{{route('admin.dashboard')}}">
    <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-8 w-8">
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"></path>
    </svg>
    <span x-show="sidebarOpen" class="hidden lg:block">Dashboard</span></a>
  <a class="font-semibold flex flex-row justify-start items-center space-x-2 {{ Request::is('services') ? 'text-black shadow-2xl bg-slate-50 rounded-2xl p-2' : '' }}" href="{{route('admin.services')}}">
    <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-7 w-7">
      <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 14.25h13.5m-13.5 0a3 3 0 01-3-3m3 3a3 3 0 100 6h13.5a3 3 0 100-6m-16.5-3a3 3 0 013-3h13.5a3 3 0 013 3m-19.5 0a4.5 4.5 0 01.9-2.7L5.737 5.1a3.375 3.375 0 012.7-1.35h7.126c1.062 0 2.062.5 2.7 1.35l2.587 3.45a4.5 4.5 0 01.9 2.7m0 0a3 3 0 01-3 3m0 3h.008v.008h-.008v-.008zm0-6h.008v.008h-.008v-.008zm-3 6h.008v.008h-.008v-.008zm0-6h.008v.008h-.008v-.008z"></path>
    </svg>
    <span x-show="sidebarOpen" class="hidden lg:block">Services</span></a>
  <div x-data="{ open: $persist(false) }" :class="{ 'bg-gray-700 rounded-3xl': open}">
    <div class="font-semibold flex flex-row justify-start items-center space-x-2 {{ Request::is('settings/*') ? 'text-black shadow-2xl bg-slate-50 rounded-2xl p-2' : '' }}" @click="open = true">
      <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-8 w-8">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12a7.5 7.5 0 0015 0m-15 0a7.5 7.5 0 1115 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077l1.41-.513m14.095-5.13l1.41-.513M5.106 17.785l1.15-.964m11.49-9.642l1.149-.964M7.501 19.795l.75-1.3m7.5-12.99l.75-1.3m-6.063 16.658l.26-1.477m2.605-14.772l.26-1.477m0 17.726l-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205L12 12m6.894 5.785l-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864l-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495"></path>
      </svg>
      <span x-show="sidebarOpen" class="hidden lg:block">Settings</span>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
      </svg>
    </div>

    <div x-show="open" x-transition.origin.top.left @click.outside="open = false" class="flex flex-col justify-center p-5 space-y-5">
      <a @click="open = true" class="font-small -ml-4 flex flex-row justify-start items-center space-x-2 pl-1 pr-2 py-2 {{ Request::is('settings/application') ? 'text-white shadow-2xl bg-slate-500 rounded-2xl' : '' }} " href="{{route('admin.settings.application')}}"> Application Settings
      </a>
      <a @click="open = true" class="font-small -ml-4 flex flex-row justify-start items-center space-x-2 pl-1 pr-2 py-2 {{ Request::is('settings/email') ? 'text-white shadow-2xl bg-slate-500 rounded-2xl' : '' }} " href="{{route('admin.settings.email')}}"> Email Settings
      </a>
    </div>
  </div>
  <!-- payment  -->
  <div x-data="{ open: $persist(false) }" :class="{ 'bg-gray-700 rounded-3xl': open}">
    <div class="font-semibold flex flex-row justify-start items-center space-x-2 {{ Request::is('payment-gateway/*') ? 'text-black shadow-2xl bg-slate-50 rounded-2xl p-2' : '' }}" @click="open = true">
      <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-8 w-8">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12a7.5 7.5 0 0015 0m-15 0a7.5 7.5 0 1115 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077l1.41-.513m14.095-5.13l1.41-.513M5.106 17.785l1.15-.964m11.49-9.642l1.149-.964M7.501 19.795l.75-1.3m7.5-12.99l.75-1.3m-6.063 16.658l.26-1.477m2.605-14.772l.26-1.477m0 17.726l-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205L12 12m6.894 5.785l-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864l-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495"></path>
      </svg>
      <span x-show="sidebarOpen" class="hidden lg:block">PaymentGateways</span>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
      </svg>
    </div>

    <div x-show="open" x-transition.origin.top.left @click.outside="open = false" class="flex flex-col justify-center p-5 space-y-5">
      <a @click="open = true" class="font-small -ml-4 flex flex-row justify-start items-center space-x-2 pl-1 pr-2 py-2 {{ Request::is('payment-gateway/razor') ? 'text-white shadow-2xl bg-slate-500 rounded-2xl' : '' }} " href="{{route('admin.razor')}}"> Razorpay
      </a>
      <a @click="open = true" class="font-small -ml-4 flex flex-row justify-start items-center space-x-2 pl-1 pr-2 py-2 {{ Request::is('payment-gateway/stripe') ? 'text-white shadow-2xl bg-slate-500 rounded-2xl' : '' }} " href="{{route('admin.stripe')}}"> Stripe
      </a>
      <a @click="open = true" class="font-small -ml-4 flex flex-row justify-start items-center space-x-2 pl-1 pr-2 py-2 {{ Request::is('payment-gateway/paypal') ? 'text-white shadow-2xl bg-slate-500 rounded-2xl' : '' }} " href="{{route('admin.paypal')}}"> Paypal
      </a>
      <a @click="open = true" class="font-small -ml-4 flex flex-row justify-start items-center space-x-2 pl-1 pr-2 py-2 {{ Request::is('payment-gateway/paystack') ? 'text-white shadow-2xl bg-slate-500 rounded-2xl' : '' }} " href="{{route('admin.paystack')}}"> Paystack
      </a>
      <a @click="open = true" class="font-small -ml-4 flex flex-row justify-start items-center space-x-2 pl-1 pr-2 py-2 {{ Request::is('payment-gateway/flutterwave') ? 'text-white shadow-2xl bg-slate-500 rounded-2xl' : '' }} " href="{{route('admin.flutterwave')}}"> Flutterwave
      </a>
    </div>
  </div>
  <a class=" font-semibold flex flex-row justify-start items-center space-x-2" wire:click.prevent="logout">

    <!-- <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-7 w-7">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"></path>
</svg>   -->
    <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-7 w-7">
      <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"></path>
    </svg>
    <span x-show="sidebarOpen" class="hidden lg:block">Logout</span>
  </a>


</div>