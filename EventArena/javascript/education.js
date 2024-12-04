const degreeStatusInputs = document.querySelectorAll('input[name="education-status"]');
    const degreeDetails = document.getElementById('degree-details');
    const educationInstitution = document.getElementById('education-institution');
    const currentlyStudyingCheckbox = document.getElementById('currently-studying-checkbox');
    const fieldOfStudy = document.getElementById('field-of-study');
    const expectedGraduation = document.getElementById('expected-graduation');

    degreeStatusInputs.forEach(input => {
      input.addEventListener('change', function() {
        if (this.value === 'degree') {
          degreeDetails.style.display = 'block';
          educationInstitution.style.display = 'block';
          currentlyStudyingCheckbox.style.display = 'block';
          fieldOfStudy.style.display = 'block';
          expectedGraduation.style.display = 'block';
        } else {
          degreeDetails.style.display = 'none';
          educationInstitution.style.display = 'none';
          currentlyStudyingCheckbox.style.display = 'none';
          fieldOfStudy.style.display = 'none';
          expectedGraduation.style.display = 'none';
        }
      });
    });

    const otherCheckbox = document.getElementById("other");
    const otherText = document.getElementById("otherText");
    const addOtherButton = document.getElementById("addOther");
    const selectedRolesContainer = document.getElementById("selectedRoles");
  
    otherCheckbox.addEventListener("change", function () {
      if (this.checked) {
        otherText.style.display = "block";
      } else {
        otherText.style.display = "none";
      }
    });
  
    addOtherButton.addEventListener("click", function () {
      const otherValue = otherText.value.trim();
      if (otherValue !== "") {
        const checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.name = "selectedRole";
        checkbox.value = otherValue;
        
        const label = document.createElement("label");
        label.innerText = otherValue;
        
        const div = document.createElement("div");
        div.classList.add("form-check");
        div.appendChild(checkbox);
        div.appendChild(label);
        
        selectedRolesContainer.appendChild(div);
        otherText.value = ""; // Clear the textbox
      }
    });

    function toggleExperienceFields() {
      const checkbox = document.getElementById("has-experience");
      const experienceFields = document.getElementById("experience-fields");
      experienceFields.style.display = checkbox.checked ? "none" : "block";
    }