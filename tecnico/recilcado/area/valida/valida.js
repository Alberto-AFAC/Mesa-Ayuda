
$('#registrationForm').bootstrapValidator({
feedbackIcons:{
valid: 'glyphicon glyphicon-ok',
invalid: 'glyphicon glyphicon-remove',
validating: 'glyphicon glyphicon-refresh'
},

fields:{
nombre: {
validators: {
notEmpty: {
message: 'El nombre es requerido'
}
  }
    },

apellido: {
validators: {
notEmpty: {
message: 'El apellido es requerido'
}
  }
    },

email: {
validators: {
notEmpty: {
message: 'El correo es requerido'
},

emailAddress: {
message: 'El correo electronico no es valido'
}
  }
    },

telefono: {
message: 'El teléfono no es valido',
validators: {
notEmpty: {
message: 'El teléfono es requerido y no puede estar vacio'

},

regexp: {
regexp: /^[0-9\-\ ]+$/,
message: 'El teléfono solo puede contener números'
}
  }
    },



celular: {
message: 'El teléfono no es valido',
validators: {
notEmpty: {
message: 'El teléfono es requerido y no puede estar vacio'

},

regexp: {
regexp: /^[0-9\-\ ]+$/,
message: 'El teléfono solo puede contener números'
}
  }
    },
empresa: {
validators: {
notEmpty: {
message: 'La empresa es requerida'
}
  }
    },
direccion: {
validators: {
notEmpty: {
message: 'La dirección es requerida'
}
  }
    },
rfc: {
validators: {
notEmpty: {
message: 'El RFC es requerido'
}
  }
    },
descrip: {
validators: {
notEmpty: {
message: 'La descripción es requerida'
}
  }
    },

      }
        });


$('#frmEditarUsuarios').bootstrapValidator({
feedbackIcons:{
valid: 'glyphicon glyphicon-ok',
invalid: 'glyphicon glyphicon-remove',
validating: 'glyphicon glyphicon-refresh'
},

fields:{
nombre: {
validators: {
notEmpty: {
message: 'El nombre es requerido'
}
  }
    },

usuario: {
validators: {
notEmpty: {
message: 'El usuario es requerido'
}
  }
    },

apellido: {
validators: {
notEmpty: {
message: 'El apellido es requerido'
}
  }
    },

email: {
validators: {
notEmpty: {
message: 'El correo es requerido'
},

emailAddress: {
message: 'El correo electronico no es valido'
}
  }
    },

telefono: {
message: 'El teléfono no es valido',
validators: {
notEmpty: {
message: 'El teléfono es requerido y no puede estar vacio'

},

regexp: {
regexp: /^[0-9\-\ ]+$/,
message: 'El teléfono solo puede contener números'
}
  }
    },

celular: {
message: 'El teléfono no es valido',
validators: {
notEmpty: {
message: 'El teléfono es requerido y no puede estar vacio'

},

regexp: {
regexp: /^[0-9\-\ ]+$/,
message: 'El teléfono solo puede contener números'
}
  }
    },
empresa: {
validators: {
notEmpty: {
message: 'La empresa es requerida'
}
  }
    },
direccion: {
validators: {
notEmpty: {
message: 'La dirección es requerida'
}
  }
    },
rfc: {
validators: {
notEmpty: {
message: 'El RFC es requerido'
}
  }
    },
descrip: {
validators: {
notEmpty: {
message: 'La descripción es requerida'
}
  }
    },

password: {
 
       validators: {
 
         notEmpty: {
 
           message: 'El password es requerido y no puede ser vacio'
 
         },
 
         stringLength: {
 
           min: 8,
 
           message: 'El password debe contener al menos 8 caracteres'
 
         }
 
       }
 
     }, 
pass: {
 
       validators: {
 
         notEmpty: {
 
           message: 'El password es requerido y no puede ser vacio'
 
         },
 
         stringLength: {
 
           min: 8,
 
           message: 'El password debe contener al menos 8 caracteres'
 
         }
 
       }
 
     }, 

         }
            });
