tinymce.init({
    selector: 'textarea',
    plugins: [
        // Core editin features
        'anchor', 'autoglink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media',
        'searchreplace', 'table', 'visualblocks', 'wordcount',
        // Your account includes a free trial of TinyMCE premium features
        // Try the most popular premium features until Feb 5, 2025:
        'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker',
        'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage',
        'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags',
        'autocorrect', 'typography', 'inlinecss', 'markdown', 'importword', 'exportword', 'exportpdf'
    ],
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [{
            value: 'First.Name',
            title: 'First Name'
        },
        {
            value: 'Email',
            title: 'Email'
        },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
        'See docs to implement AI Assistant')),
});
document.addEventListener('DOMContentLoaded', function () {
    const titleInput = document.getElementById('title');
    const slugInput = document.getElementById('slug');

    // Flag to track if the slug has been manually changed
    let isSlugManuallyChanged = false;

    // Function to generate a slug from the title
    function generateSlug(title) {
        return title
            .toLowerCase() // Convert to lowercase
            .replace(/[^a-z0-9\s-]/g, '') // Remove special characters
            .replace(/\s+/g, '-') // Replace spaces with hyphens
            .replace(/-+/g, '-') // Replace multiple hyphens with a single hyphen
            .trim(); // Remove leading/trailing spaces
    }

    // Update slug when title changes
    titleInput.addEventListener('input', function () {
        if (!isSlugManuallyChanged) {
            const title = titleInput.value;
            const slug = generateSlug(title);
            slugInput.value = slug;
        }
    });

    // Track manual changes to the slug input
   /* slugInput.addEventListener('input', function () {
        const title = titleInput.value;
        const autoSlug = generateSlug(title);

       /!* // If the slug input matches the auto-generated slug, reset the flag
        if (slugInput.value === autoSlug || slugInput.value === '') {
            isSlugManuallyChanged = true;
        } else {
            isSlugManuallyChanged = true;
        }*!/
    });*/
});
