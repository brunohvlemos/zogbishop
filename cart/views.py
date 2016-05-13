from django.shortcuts import render
from django.shortcuts import render_to_response
from django.template import RequestContext
from paypal.standard.forms import PayPalPaymentsForm
from cart import *
from django.core.urlresolvers import reverse


def show_cart(request, template_name="cart/_cart.html"):
	if request.method == 'POST':
		postdata = request.POST.copy()
		if postdata['submit'] == 'Remover':
			remove_from_cart(request)
		if postdata['submit'] == 'Atualizar':
			update_cart(request)
	cart_items = get_cart_items(request)
	page_title = 'Shopping Cart'
	cart_subtotal = get_cart_subtotal(request)
	return render_to_response(template_name, locals(), context_instance=RequestContext(request))

def view_that_asks_for_money(request):
	paypal_dict = {
		"cmd": "_cart",
		"upload": "1",
		"currency_code": "BRL",
		"business": "brunohvlemos@gmail.com",
		"invoice": "unique-invoice-id",
		"notify_url": "http://www.example.com" + reverse('paypal-ipn'),
		"return_url": "https://www.example.com/cart/",
		"cancel_return": "http://www.example.com/",
		"custom": "Upgrade all users!"
	}
	cartItem = CartItem.objects.all()
	i=1
	for item in cartItem:
		paypal_dict.update({"item_name_"+str(i): item.product.name})
		paypal_dict.update({"amount_"+str(i): item.product.price})
		paypal_dict.update({"quantity_"+str(i): item.quantity})
		i=i+1

	form = PayPalPaymentsForm(initial = paypal_dict)
	context = {"form": form}
	return render(request, "cart/payment.html", context)