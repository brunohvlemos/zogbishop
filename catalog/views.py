from django.shortcuts import render, get_object_or_404, render_to_response
from models import Category, Product, Question, Choice
from django.template import RequestContext
from django.core import urlresolvers
from cart import cart
from django.http import HttpResponseRedirect, HttpResponse
from cart.forms import ProductAddToCartForm
from forms import UploadFileForm
import django_excel as excel
import pyexcel.ext.xls
import pyexcel.ext.xlsx
import pyexcel.ext.ods3
from django.views.generic import View
# Create your views here.

def index(request, template_name="catalog/index.html"):
	page_title = 'Tecidos Zogbi e Patchwork'
	return render_to_response(template_name, locals(),context_instance=RequestContext(request))

def show_category(request, category_slug, template_name="catalog/single.html"):
	c = get_object_or_404(Category, slug=category_slug)
	products = c.product_set.all()
	page_title = c.name
	meta_keywords = c.meta_keywords
	meta_description = c.meta_description
	return render_to_response(template_name, locals(),context_instance=RequestContext(request))

def show_product(request, product_slug, template_name="catalog/product.html"):
	p = get_object_or_404(Product, slug=product_slug)
	categories = p.categories.all()
	page_title = p.name
	meta_keywords = p.meta_keywords
	meta_description = p.meta_description
	# need to evaluate the HTTP method
	if request.method == 'POST':
		# # add to cart...create the bound form
		postdata = request.POST.copy()
		form = ProductAddToCartForm(request, postdata)
		# #check if posted data is valid
		# form.fields['product_slug'].widget.attrs['value'] = 'product_slug'
		# 	#add to cart and redirect to cart page
		cart.add_to_cart(request, product_slug)
		# 	# if test cookie worked, get rid of it
		if request.session.test_cookie_worked():
			request.session.delete_test_cookie()
		url = urlresolvers.reverse('show_cart')
		return HttpResponseRedirect(url)
	else:
		form = ProductAddToCartForm(label_suffix=':')
	# # assign the hidden input the product slug
	# set the test cookie on our first GET request
	request.session.set_test_cookie()
	return render_to_response('catalog/product.html', locals(),context_instance=RequestContext(request))


class  UploadFile(View):

	def get (self,request):
		form = UploadFileForm()
		return render(request, 'catalog/index.html', locals())

	def post(self, request):
		form = UploadFileForm(request.POST, request.FILES)
		if form.is_valid():
			filehandle = request.FILES['file']
			return excel.make_response(filehandle.get_sheet(), 'xls', file_name='nome_do_arquivo')




class ImportData(View):

	def get (self,request):
		form = UploadFileForm()
		return render(request, 'catalog/index.html', locals())

	def post(self, request):
		form = UploadFileForm(request.POST, request.FILES)
		if form.is_valid():
			request.FILES['file'].save_to_database(
                model= Question,
                mapdict=['question_text', 'pub_date', 'slug']
				)
			return HttpResponse("OK", status=200)
		else:
			return HttpResponseBadRequest()
