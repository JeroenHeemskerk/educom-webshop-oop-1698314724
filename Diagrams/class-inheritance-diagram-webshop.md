```mermaid
---
title: Class Inheritance Diagram - Webshop
---
classDiagram
    note "+ = public, - = private, # = protected"
    %% A <|-- B means that class B inherits from class A %%
    HtmlDoc <|-- BasicDoc

    BasicDoc <|-- HomeDoc
    BasicDoc <|-- AboutDoc
    BasicDoc <|-- FormDoc
    BasicDoc <|-- ProductServiceDoc

    FormDoc <|-- ContactDoc
    FormDoc <|-- LoginDoc
    FormDoc <|-- RegisterDoc
        
    ProductServiceDoc  <|-- WebshopDoc
    ProductServiceDoc  <|-- ProductDoc
    ProductServiceDoc  <|-- ShoppingcartDoc


    class HtmlDoc{
       +show()
       -showHtmlStart()
       -showHeaderStart()
       #showHeaderContent()
       -showHeaderEnd()
       -showBodyStart()
       #showBodyContent()
       -showBodyEnd()
       -showHtmlEnd()
    }
    class BasicDoc{
        #data 
        +__construct(mydata)
        #showHeaderContent()
        -showTitle()
        -showCssLinks()
        #showBodyContent()
        #showHeader()
        -showMenu()
        #showContent()
        -showFooter()
    }
    class HomeDoc{
        #showHeader()
        #showContent()
    }

    class AboutDoc{
        #showHeader()
        #showContent()
    }


    class FormDoc{
        #showHeader()
        #showContent()
        #getPageData()
        #validateForm()
    }
    class ContactDoc{
        #showHeader()
        #showContent()
        #getPageData()
        #validateForm()
        #validateDoc()
    }

    class LoginDoc{
        #showHeader()
        #showContent()
        #getPageData()
        #validateForm()
        #validateDoc()
    }
    class RegisterDoc{
        #showHeader()
        #showContent()
        #getPageData()
        #validateForm()
        #validateDoc()
    }

    class ValidateDoc{
        #collectRequiredField()
        #collectAndValidateName()
        #collectAndValidateEmail()
    }




    class ProductServiceDoc{
        #initializePageData()
        #handleActions()
        #getPageData()
        #showHeader()
        #showContent()
    }
    class WebshopDoc{
        #initializePageData()
        #handleActions()
        #getPageData()
        +showHeader()
        +showContent()
        -showProductCard()
    }
    class ShoppingcartDoc{
        #initializePageData()
        #handleActions()
        #getPageData()
        +showHeader()
        +showContent()
        -showProductLine()
    }
    class ProductDoc{
        #initializePageData()
        #handleActions()
        #getPageData()
        +showHeader()
        +showContent()
        -showProduct()
    }



