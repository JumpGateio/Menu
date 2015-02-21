Drop Downs
==========
A drop down is just a link that allows you to add sub links.

This Class also implements the linkable trait so it has access to all the link and drop down add methods in the menu class.

.. note:: See link documentation for methods and properties.

Check if the drop down has links
--------------------------------
You can call the ``count()`` method on the drop down class to see if there are any links
This is to allow you to run a foreach if there are links present. Otherwise treat it as a normal link.