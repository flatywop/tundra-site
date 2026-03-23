document.addEventListener("DOMContentLoaded", function () {
  const burger = document.querySelector(".burger");
  const mobileMenu = document.querySelector(".mobile-menu");
  const mobileLinks = document.querySelectorAll(".mobile-menu__link");

  const modal = document.getElementById("order-modal");
  const modalBackdrop = document.querySelector(".modal__backdrop");
  const modalClose = document.querySelector(".modal__close");
  const modalOpeners = document.querySelectorAll('a[href="#order-modal"]');

  const form = document.getElementById("order-form");
  const phoneInput = form ? form.querySelector('input[name="phone"]') : null;
  const message = document.getElementById("form-message");

  function openMenu() {
    if (!burger || !mobileMenu) return;
    burger.classList.add("is-active");
    burger.setAttribute("aria-expanded", "true");
    mobileMenu.classList.add("is-open");
    document.body.style.overflow = "hidden";
  }

  function closeMenu() {
    if (!burger || !mobileMenu) return;
    burger.classList.remove("is-active");
    burger.setAttribute("aria-expanded", "false");
    mobileMenu.classList.remove("is-open");
    document.body.style.overflow = "";
  }

  if (burger && mobileMenu) {
    burger.addEventListener("click", function () {
      const isOpen = mobileMenu.classList.contains("is-open");
      if (isOpen) {
        closeMenu();
      } else {
        openMenu();
      }
    });

    mobileLinks.forEach((link) => {
      link.addEventListener("click", closeMenu);
    });
  }

  function openModal() {
    if (!modal) return;
    modal.classList.add("is-open");
    modal.setAttribute("aria-hidden", "false");
    document.body.style.overflow = "hidden";
  }

  function closeModal() {
    if (!modal) return;
    modal.classList.remove("is-open");
    modal.setAttribute("aria-hidden", "true");
    document.body.style.overflow = "";
  }

  modalOpeners.forEach((link) => {
    link.addEventListener("click", function (event) {
      event.preventDefault();
      closeMenu();
      openModal();
    });
  });

  if (modalBackdrop) {
    modalBackdrop.addEventListener("click", closeModal);
  }

  if (modalClose) {
    modalClose.addEventListener("click", closeModal);
  }

  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
      closeModal();
      closeMenu();
    }
  });

  function formatPhone(value) {
    const digits = value.replace(/\D/g, "").replace(/^8/, "7").slice(0, 11);

    let result = "+7";
    if (digits.length > 1) result += " (" + digits.slice(1, 4);
    if (digits.length >= 4) result += ")";
    if (digits.length > 4) result += " " + digits.slice(4, 7);
    if (digits.length > 7) result += "-" + digits.slice(7, 9);
    if (digits.length > 9) result += "-" + digits.slice(9, 11);

    return result;
  }

  if (phoneInput) {
    phoneInput.addEventListener("input", function () {
      const digits = this.value.replace(/\D/g, "");
      if (!digits.length) {
        this.value = "";
        return;
      }

      let normalized = digits;
      if (normalized[0] === "8") normalized = "7" + normalized.slice(1);
      if (normalized[0] !== "7") normalized = "7" + normalized;

      this.value = formatPhone(normalized);
    });

    phoneInput.addEventListener("focus", function () {
      if (!this.value) {
        this.value = "+7";
      }
    });
  }

  if (form) {
  form.addEventListener("submit", async function (event) {
    event.preventDefault();

    const formData = new FormData(form);
    const name = (formData.get("name") || "").toString().trim();
    const phone = (formData.get("phone") || "").toString().trim();
    const phoneDigits = phone.replace(/\D/g, "");

    message.hidden = false;
    message.classList.remove("is-success", "is-error");

    if (!name || phoneDigits.length < 11) {
      message.textContent = "Пожалуйста, заполните имя и телефон полностью.";
      message.classList.add("is-error");
      return;
    }

    try {
      const response = await fetch("order.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify({ name, phone })
      });

      const result = await response.json();

      if (result.success) {
        message.textContent = "Заявка отправлена!";
        message.classList.add("is-success");
        form.reset();
      } else {
        message.textContent = "Ошибка отправки.";
        message.classList.add("is-error");
      }

    } catch (error) {
      message.textContent = "Ошибка соединения с сервером.";
      message.classList.add("is-error");
    }
  });
}

  const revealItems = document.querySelectorAll(".reveal");

  function revealOnScroll() {
    const windowHeight = window.innerHeight;
    const triggerPoint = windowHeight * 0.82;

    revealItems.forEach((item) => {
      const rect = item.getBoundingClientRect();
      const itemTop = rect.top;
      const itemBottom = rect.bottom;

      if (itemTop < triggerPoint && itemBottom > 80) {
        item.classList.add("is-visible");
      } else {
        item.classList.remove("is-visible");
      }
    });
  }

  window.addEventListener("scroll", revealOnScroll);
  window.addEventListener("resize", revealOnScroll);
  window.addEventListener("load", revealOnScroll);

  setTimeout(revealOnScroll, 100);
});