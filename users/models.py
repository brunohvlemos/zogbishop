from __future__ import unicode_literals

# -*- coding: utf-8 -*-

import os
import datetime

from datetime import date
from django.db import models
from django.conf import settings
from django.utils import timezone
from django.contrib.auth.models import User, Group, Permission


class Comum (models.Model):
    nome= models.CharField("Nome", max_length = 64)
    sobrenome = models.CharField("Sobrenome", max_length = 128)
    celular = models.CharField("Telefone Celular", max_length = 14, null=True, blank=True)
    foto_perfil = models.ImageField("Foto de Perfil", upload_to='photos', blank=True)

    class Meta:
        abstract = True

class Usuario (Comum):
    user = models.OneToOneField(User, null=True, blank=True)

    def __str__(self):
        return self.nome