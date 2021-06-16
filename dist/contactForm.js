"use strict";

var elements = {
  full_name: {
    e: document.getElementById('full_name'),
    f: verifyString
  },
  email: {
    e: document.getElementById('email'),
    f: validateEmail
  },
  phone: {
    e: document.getElementById('phone'),
    f: validatePhone
  },
  subject: {
    e: document.getElementById('subject'),
    f: verifyString
  },
  message: {
    e: document.getElementById('message'),
    f: verifyString
  },
  newsletterMarketing: {
    t: true,
    e: document.getElementById('newsletterMarketing'),
    f: validateTick
  }
};

function verifyString(str) {
  if (typeof str === 'string') {
    return str.length > 0;
  }

  return false;
}

function validateEmail(mail) {
  return /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(mail);
}

function validatePhone(phone) {
  return /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/.test(phone);
}

function validateTick(val) {
  return val;
}

function giveErrorTags(brokenArray) {
  for (var p in elements) {
    var ele = elements[p].e;
    console.log(ele.classList);
    ele.classList.remove('inputError');
    document.getElementById("".concat(p, "_error")).classList.add('d-none');
  }

  brokenArray.forEach(function (v, i) {
    var element = elements[v].e;
    element.classList.add('inputError');
    document.getElementById("".concat(v, "_error")).classList.remove('d-none');
  });
}

document.getElementById('contactSubmit').onclick = function () {
  var failed = [];
  var values = {};

  for (var key in elements) {
    var obj = elements[key];
    var value = obj.e.value;

    if (obj.t) {
      value = obj.e.checked;
    }

    if (!obj.f(value)) {
      failed.push(key);
    } else {
      values[key] = value;
    }
  }

  if (failed.length === 0) {
    $.post('actions/contactSubmit.php', values, function (data) {
      data = JSON.parse(data);

      if (data.status) {
        document.getElementById('preSCover').classList.add('successCover');
        setTimeout(function () {
          document.getElementById('contactForm').classList.add('lockForm');
        }, 100);

        for (var p in elements) {
          var ele = elements[p].e;
          ele.disabled = true;
        }

        document.getElementById('contactSubmit').disabled = true;
      } else {
        giveErrorTags(data);
      }
    });
  } else {
    giveErrorTags(failed);
  }
};