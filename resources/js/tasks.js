// Manage tasks
const deletes = document.querySelectorAll('.delete-element')
const deleteDialog = document.querySelector('.dialog')
const closeDialogBtn = document.getElementById('close-dialog')
const deleteDialogBtn = document.getElementById('.delete-element-btn')
const inputIdToDelete = document.querySelector('.id-to-delete')
const deleteForm = document.querySelector('.delete-form')

deletes.forEach(d => {
  d.addEventListener('click', async function (event) {
    let elementIdToDelete =
      await event.target.localName === "i" ?
        event.target.parentNode.id :
        event.target.id

    await deleteDialog.showModal()
    inputIdToDelete.value = elementIdToDelete.split("-")[1]
    deleteForm.action = `${location.origin}/${elementIdToDelete.split("-")[0]}s/${elementIdToDelete.split("-")[1]}`
  })
});

if (deleteDialog && closeDialogBtn) {
  closeDialogBtn.addEventListener("click", function (event) {
    deleteDialog.close()
  })
}

const filterByProjectSelect = document.getElementById("project-filter-select")
const filterByProjectForm = document.getElementById("project-filter-form")

if (filterByProjectSelect && filterByProjectForm) {
  filterByProjectSelect.addEventListener("change", function (event) {
    filterByProjectForm.submit()
  })
}
