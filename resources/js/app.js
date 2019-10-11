/**
* First we will load all of this project's JavaScript dependencies which
* includes Vue and other libraries. It is a great starting point when
* building robust, powerful web applications using Vue and Laravel.
*/

require('./bootstrap');

window.Vue = require('vue');

import ExampleComponent from './components/ExampleComponent.vue';

/**
* The following block of code may be used to automatically register your
* Vue components. It will recursively scan this directory for the Vue
* components and automatically register them with their "basename".
*
* Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
*/

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', ExampleComponent);

/**
* Next, we will create a fresh Vue application instance and attach it to
* the page. Then, you may begin adding components to this application
* or customize the JavaScript scaffolding to fit your unique needs.
*/

const app = new Vue({
	el: '#app',
});

// Create a Stripe client.
var stripe = Stripe(STRIPE_KEY);

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
	base: {
		color: '#32325d',
		fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
		fontSmoothing: 'antialiased',
		fontSize: '16px',
		'::placeholder': {
			color: '#aab7c4'
		}
	},
	invalid: {
		color: '#fa755a',
		iconColor: '#fa755a'
	}
};

const cardElement = elements.create('card', {style: style});
cardElement.mount('#card-element');

const cardHolderName = document.getElementById('card-holder-name');
const cardButton = document.getElementById('card-button');
const clientSecret = cardButton.dataset.secret;

// Handle real-time validation errors from the card Element.
cardElement.addEventListener('change', function(event) {
	var displayError = document.getElementById('card-errors');
	cardButton.removeAttribute('disabled');
	if (event.error) {
		displayError.textContent = event.error.message;
	} else {
		displayError.textContent = '';
	}
});

cardButton.addEventListener('click', async (e) => {
	event.preventDefault();

	cardButton.setAttribute('disabled', true);
	
	const { setupIntent, error } = await stripe.handleCardSetup(
		clientSecret, cardElement, {
			payment_method_data: {
				billing_details: { name: cardHolderName.value }
			}
		}
	);
	
	if (error) {
		// Display "error.message" to the user...
		var errorElement = document.getElementById('card-errors');
		errorElement.textContent = result.error.message;
	} else {
		
		const form = document.getElementById('payment-form');
		const hiddenInput = document.createElement('input');
		hiddenInput.setAttribute('type', 'hidden');
		hiddenInput.setAttribute('name', 'paymentMethod');
		hiddenInput.setAttribute('value', setupIntent.payment_method);
		form.appendChild(hiddenInput);
		
		// Submit the form
		form.submit();
	}
});