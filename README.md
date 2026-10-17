# Marc Whesley Bartolome — Portfolio

Assignment-ready, single-page portfolio using semantic HTML, Tailwind CSS via its Play CDN, and vanilla JavaScript. Open `index.html` in a browser with an internet connection so Tailwind can load.

Repeated utility classes are grouped on their parent elements with Tailwind arbitrary child variants. For example, the project grid styles every direct article image with `[&>article>img]:...`, and the contact form styles its labels and controls with `[&_label]:...`, `[&_input]:...`, and `[&_button]:...`.

## Project structure

```text
portfolio-submission/
├── index.html
├── js/
│   └── main.js
└── assets/
    ├── icons/
    └── images/
        ├── profile/
        └── projects/
```

## JavaScript feature currently implemented

- Accessible mobile navigation toggle. It opens and closes with the menu button and closes after a navigation link is selected.

The assignment requires at least three JavaScript features. Add and document two more before submitting, such as active navigation highlighting and client-side contact form validation with a local confirmation message.

## Before submitting

- Review every section and make sure the biography, skills, project details, course information, and contact details are accurate.
- Add any school, program, training, certification, or experience details you want listed.
- Check image usage rights and add credits if any included asset came from another creator.
- Test the layout at 375 px, 768 px, and 1280 px; capture the required screenshots.
- Complete the AI usage documentation and remove its example rows before exporting it as a PDF.
- Zip this `portfolio-submission` folder as `Lastname_Portfolio.zip`. The original PHP/MySQL application remains outside this folder and is not part of the assignment submission.

Tailwind's official Play CDN is intended for development and learning. The class assignment permits CDN use; for a production site, build a static Tailwind stylesheet instead.
