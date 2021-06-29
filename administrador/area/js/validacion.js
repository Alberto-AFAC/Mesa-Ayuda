$('#container').bootstrapValidator({
feedbackIcons:{
valid: 'glyphicon glyphicon-ok',
invalid: 'glyphicon glyphicon-remove',
validating: 'glyphicon glyphicon-refresh'
},

fields:{

renumero: {
validators: {
notEmpty: {
message: 'El numero es requerido'
},
regexp:{
     regexp: /^[0-9]+$/,
     message: 'El campo solo puede contener números'
}
  }
    },
reestado: {
validators: {
notEmpty: {
message: 'El estado es requerido'
}
  }
    },
repuerto: {
validators: {
notEmpty: {
message: 'El puerto es requerido'
}
  }
    },
reinstalacion_portuaria: {
validators: {
notEmpty: {
message: 'La instalacion portuaria es requerido'
}
  }
    },
redirector_general: {
validators: {
notEmpty: {
message: 'El registro es requerido'
}
  }
    },
recorreo_dg: {
validators: {
notEmpty: {
message: 'El correo es requerido'
},
emailAddress: {
message: 'El correo electronico no es valido'
}
  }
    },

recelular: { 
       message: 'El celular no es valido', 
       validators: { 
         notEmpty: { 
           message: 'El celular es requerido y no puede ser vacio' 
         }, 
         regexp: { 
           regexp: /^[0-9,/-]+$/,
           message: 'El celular solo puede contener números'
         } 
       } 
     },

reopip_nombre: {
validators: {
notEmpty: {
message: 'El nombre opip es requerido'
}
  }
    },

retel_extension: {
validators: {
notEmpty: {
message: 'El registro es requerido'
},
regexp: { 
           regexp: /^[0-9,Tel: ,Ext: ,/-]+$/,
           message: 'Escriba Tel: o Ext:  y enseguida el número'
         }
      }
    },  
recorreo_opip: {
validators: {
notEmpty: {
message: 'El correo es requerido'
},
emailAddress: {
message: 'El correo electronico no es valido'
}
  }
    },
recelular_24hrs: { 
       message: 'El celular no es valido', 
       validators: { 
         notEmpty: { 
           message: 'El celular es requerido y no puede ser vacio' 
         }, 
         regexp: { 
           regexp: /^[0-9,/-]+$/,
           message: 'El celular solo puede contener números'
         } 
       } 
     },

reescuela_nautica: {
validators: {
notEmpty: {
message: 'El registro es requerido'
}
  }
    },
reprofesion: {
validators: {
notEmpty: {
message: 'El registro es requerido'
}
  }
    },
reexp_cert: {
validators: {
notEmpty: {
message: 'El registro es requerido'
}
  }
    },
revig_cert: {
validators: {
notEmpty: {
message: 'El registro es requerido'
}
  }
    },
  observ: {
  validators: {
  notEmpty: {
  message: 'El registro es opcional '
  }
    }
      },
        }
          });


$('#modalEdicion').bootstrapValidator({
feedbackIcons:{
valid: 'glyphicon glyphicon-ok',
invalid: 'glyphicon glyphicon-remove',
validating: 'glyphicon glyphicon-refresh'
},
fields:{
renumero: {
validators: {
notEmpty: {
message: 'El numero es requerido'
},
regexp:{
     regexp: /^[0-9]+$/,
     message: 'El campo solo puede contener números'
}
  }
    },
reestado: {
validators: {
notEmpty: {
message: 'El estado es requerido'
}
  }
    },
repuerto: {
validators: {
notEmpty: {
message: 'El puerto es requerido'
}
  }
    },
reinstalacion_portuaria: {
validators: {
notEmpty: {
message: 'La instalacion portuaria es requerido'
}
  }
    },
redirector_general: {
validators: {
notEmpty: {
message: 'El registro es requerido'
}
  }
    },
recorreo_dg: {
validators: {
notEmpty: {
message: 'El correo es requerido'
},
emailAddress: {
message: 'El correo electronico no es valido'
}
  }
    },
recelular: { 
       message: 'El celular no es valido', 
       validators: { 
         notEmpty: { 
           message: 'El celular es requerido y no puede ser vacio' 
         }, 
         regexp: { 
           regexp: /^[0-9,/-]+$/,
           message: 'El celular solo puede contener números'
         } 
       } 
     },
reopip_nombre: {
validators: {
notEmpty: {
message: 'El nombre opip es requerido'
}
  }
    },
retel_extension: {
validators: {
notEmpty: {
message: 'El registro es requerido'
},
regexp: { 
           regexp: /^[0-9,Tel: ,Ext: ,/-]+$/,
           message: 'Escriba Tel: o Ext:  y enseguida el número'
         }
      }
    },  
recorreo_opip: {
validators: {
notEmpty: {
message: 'El correo es requerido'
},
emailAddress: {
message: 'El correo electronico no es valido'
}
  }
    },
recelular_24hrs: { 
       message: 'El celular no es valido', 
       validators: { 
         notEmpty: { 
           message: 'El celular es requerido y no puede ser vacio' 
         }, 
         regexp: { 
           regexp: /^[0-9,/-]+$/,
           message: 'El celular solo puede contener números'
         } 
       } 
     },
reescuela_nautica: {
validators: {
notEmpty: {
message: 'El registro es requerido'
}
  }
    },
reprofesion: {
validators: {
notEmpty: {
message: 'El registro es requerido'
}
  }
    },
reexp_cert: {
validators: {
notEmpty: {
message: 'El registro es requerido'
}
  }
    },
revig_cert: {
validators: {
notEmpty: {
message: 'El registro es requerido'
}
  }
    },
observ: {
validators: {
notEmpty: {
message: 'El registro es opcional '
  }
    }
      },
      }
        });


$('#agregarip').bootstrapValidator({
  feedbackIcons:{
  valid: 'glyphicon glyphicon-ok',
  invalid: 'glyphicon glyphicon-remove',
  validating: 'glyphicon glyphicon-refresh'
},
fields:{
rinstalacion_portuaria: {
  validators: {
    notEmpty: {
      message: 'El registro es requerido'
}
  }
    },

 restado:{
  validators:{
    notEmpty:{
      message : 'El registro es requerido'
    }
  }
 },
 rpuerto:{
  validators:{
    notEmpty:{
      message : 'El registro es requerido'
    }
  }
 },
 rdirector_general:{
  validators:{
    notEmpty:{
      message : 'El registro es requerido'
    }
  }
 },
 rcorreo:{
  validators:{
    notEmpty:{
      message : 'El registro es requerido'
    }
  }
 },
 rcelular:{
  validators:{
    notEmpty:{
      message : 'El registro es requerido'
    }
  }
 },
 rdireccion:{
  validators:{
    notEmpty:{
      message : 'El registro es requerido'
    }
  }
 },
 robserv:{
  validators:{
    notEmpty:{
      message : 'El registro es requerido'
        }
      }
    },
  }
});


$('#contcscn').bootstrapValidator({
feedbackIcons:{
valid: 'glyphicon glyphicon-ok',
invalid: 'glyphicon glyphicon-remove',
validating: 'glyphicon glyphicon-refresh'
},

fields:{

rdatos_centro: {
validators: {
notEmpty: {
message: 'El registro es requerido'
}
  }
    },
rnombre_titular: {
validators: {
notEmpty: {
message: 'El registro es requerido'
}
  }
    },
 rtipo_cscn:{
  validators:{
    notEmpty:{
      message: 'El registro es requerido'
    }
  }
 },
 rfrecuenciae:{
  validators:{
    notEmpty:{
      message: 'El registro es requerido'
    }
  }
 },
 roperadoresr:{
  validators:{
    notEmpty:{
      message: 'El registro es requerido'
    }
  }
 },
 rhorarioc:{
  validators:{
    notEmpty:{
      message: 'El registro es requerido'
    }
  }
 },
 rdeteccion:{
  validators:{
    notEmpty:{
      message: 'El registro es requerido'
    }
  }
 },
 rmonitoreo:{
  validators:{
    notEmpty:{
      message: 'El registro es requerido'
    }
  }
 },
 rcomunicaciones:{
  validators:{
    notEmpty:{
      message: 'El registro es requerido'
    }
  }
 },
 rcctv:{
  validators:{
    notEmpty:{
      message: 'El registro es requerido'
    }
  }
 },
 rmeteorologico:{
  validators:{
    notEmpty:{
      message: 'El registro es requerido'
    }
  }
 },
 robserv:{
  validators:{
    notEmpty:{
      message: 'El registro es requerido'
     }
    }
   },  
  }
});


$('#modalRegistrar').bootstrapValidator({
feedbackIcons:{
valid: 'glyphicon glyphicon-ok',
invalid: 'glyphicon glyphicon-remove',
validating: 'glyphicon glyphicon-refresh'
},

fields:{

 renombre:{
  validators:{
    notEmpty:{
      message: 'El registro es requerido'
    }
  }
 },
 rtelefono:{
  validators:{
    notEmpty:{
      message: 'El registro es requerido'
    }
  }
 },
 rcorreo:{
  validators:{
    notEmpty:{
      message: 'El registro es requerido'
    }
  }
 },
 rexp_cert:{
  validators:{
    notEmpty:{
      message: 'El registro es requerido'
    }
  }
 },
 revig_cert:{
  validators:{
    notEmpty:{
      message: 'El registro es requerido'
    }
  }
 },
 reobserv:{
  validators:{
    notEmpty:{
      message: 'El registro es requerido'
    }
  }
 },
  }
});




