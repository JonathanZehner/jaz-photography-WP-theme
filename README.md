# JAZ Photography

WordPress theme created for photographer websites. 

## Designed by: Nomad Web Designs

---

### Outside Resources Credited:

-<p>

---

### Issues Experienced:

- #### Issue 1: Contact Form 

  <p> Contact Form plugin from WPForms would not load properly on Contact page.
  
  ##### Resolution: I added another block element above the shortcode for the WPForms form.
  
- #### Issue 2: Blog Page Permalinks

  <p> Permalinks on individual blog links did not link to the individual blog post. Instead, they only linked to the main blog page.
  
  ##### Resolution: The code within index.php to retrieve the permalinks was incorrect. The broken code snippet was `<?php get_the_permalink(); ?>`. It should have been `<?php the_permalink(); ?>`. Once I deleted "get" from the code, the links worked properly with the intended slug.
        


