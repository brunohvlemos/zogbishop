"""zogbishop URL Configuration

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/1.8/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  url(r'^$', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  url(r'^$', Home.as_view(), name='home')
Including another URLconf
    1. Add an import:  from blog import urls as blog_urls
    2. Add a URL to urlpatterns:  url(r'^blog/', include(blog_urls))
"""
from django.conf.urls import include, url
from django.contrib import admin
from zogbishop import settings

urlpatterns = (
    url(r'^admin/', include(admin.site.urls)),
    url(r'^', include('catalog.urls')),
    url(r'^cart/', include('cart.urls')),
    url(r'^paypal/', include('paypal.standard.ipn.urls')),
    url(r'^pages/', include('django.contrib.flatpages.urls')),
    url(r'^static/(?P<path>.*)$', 'django.views.static.serve',
{ 'document_root' : '/home/bruno/zogbishop/static' }),
)

handler404 = 'zogbishop.views.file_not_found_404'

# if settings.DEBUG:
# 	urlpatterns += ('',
# url(r'^static/(?P<path>.*)$', 'django.views.static.serve',
# 		{ 'document_root' : '/home/bruno/zogbishop/static' }),
# )