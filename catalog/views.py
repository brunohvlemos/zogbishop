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

class IndexView(View):
	template_name="catalog/index.html"
	products = Product.objects.all().order_by('-created_at')
	best_sellers = Product.objects.filter(is_bestseller = True).order_by('-created_at')[:2]
	def get(self, *args, **kwargs):
		
		return render_to_response(template_name, locals(),context_instance=RequestContext(request))

	def post(self):
		texto_procurado = request.POST['texto_procurado']
		lista_de_ids = []
		filtro ={}
		for field in Product._meta.fields:
			if field.name!='id':
				if field.get_internal_type() == 'CharField' or field.get_internal_type() == 'TextField' or field.get_internal_type() == 'IntegerField':
					nome_filtro = str(field.name)+'__icontains'
					filtro = {}
					filtro[nome_filtro] = texto_procurado
					products = Product.objects.filter(**filtro)
					for p in qs_products:
						lista_de_ids.append(p.id)
					products = Product.objects.filter(id__in=lista_de_ids)

		return render_to_response(template_name, locals(),context_instance=RequestContext(request))




def index(request, template_name="catalog/index.html"):
	page_title = 'Tecidos Zogbi e Patchwork'
	products = Product.objects.all().order_by('-created_at')
	best_sellers = Product.objects.filter(is_bestseller = True).order_by('-created_at')[:2]
	return render_to_response(template_name, locals(),context_instance=RequestContext(request))


def show_category(request, category_slug, template_name="catalog/single.html"):
	best_sellers = Product.objects.filter(is_bestseller = True).order_by('-created_at')[:2]
	c = get_object_or_404(Category, slug=category_slug)
	products = c.product_set.all()
	page_title = c.name
	meta_keywords = c.meta_keywords
	meta_description = c.meta_description
	return render_to_response(template_name, locals(),context_instance=RequestContext(request))

def show_product(request, product_slug, template_name="catalog/product.html"):
	best_sellers = Product.objects.filter(is_bestseller = True).order_by('-created_at')[:2]
	p = get_object_or_404(Product, slug=product_slug)
	categories = p.categories.all()
	page_title = p.name
	meta_keywords = p.meta_keywords
	meta_description = p.meta_description
	# need to evaluate the HTTP method
	if request.method == 'POST':
		print(request.POST)
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
