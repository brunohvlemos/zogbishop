from django.conf.urls import *
from catalog.views import *

urlpatterns = patterns('catalog.views',
	url(r'^oi$', ImportData.as_view(), ''),
	url(r'^$', 'index', { 'template_name':'catalog/index.html',}, 'catalog_home'),
	url(r'^category/(?P<category_slug>[-\w]+)/$', 'show_category', {'template_name':'catalog/category.html',},'catalog_category'),
	url(r'^product/(?P<product_slug>[-\w]+)/$', 'show_product', {'template_name':'catalog/single.html',},'catalog_product'),
)