import pandas as pd
import numpy as np
import matplotlib
import matplotlib.pyplot as plt
import matplotlib.ticker as ticker
matplotlib.rcParams.update({'font.size':16})
from sklearn.preprocessing import OneHotEncoder
from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score
from sklearn.tree import DecisionTreeClassifier
from sklearn.ensemble import RandomForestClassifier
from sklearn.neighbors import KNeighborsClassifier
from sklearn.ensemble import RandomForestClassifier
from sklearn.neural_network import MLPClassifier



data=pd.read_csv('C:\\Users\\sony\\Desktop\\responses.csv')
pd.set_option('display.max_columns',200)
print(data.head(2))
print(data.shape)
print(data.describe())

music=data.iloc[0:,1:19].copy()
fig=plt.figure(figsize=(18,18))
ax = fig.add_subplot(111)
cax = ax.matshow(music.corr())
print(music.corr())
fig.colorbar(cax)
ax.xaxis.set_major_locator(ticker.MultipleLocator(1))
ax.yaxis.set_major_locator(ticker.MultipleLocator(1))
ax.set_xticklabels([' ']+music.columns.tolist()  ,rotation=90 )
ax.set_yticklabels([' ']+music.columns.tolist()   )

plt.show()

numerical_data = data._get_numeric_data()
categorical_data = data.select_dtypes(include=['object'])

for column in numerical_data:
    numerical_data[column].fillna(0, inplace=True)
    mean = int(np.median(numerical_data[column].unique())+.5)
    numerical_data[column] = numerical_data[column].apply(lambda x : 1 if x > mean else 0)

for column in categorical_data.columns:
    categorical_data[column] = categorical_data[column].astype('category')
    categorical_data[column] = categorical_data[column].cat.codes

categorical_data = categorical_data.replace(-1,10)
print(categorical_data.shape)
categorical_data=OneHotEncoder().fit_transform(categorical_data).toarray()
print(categorical_data.shape)

categorical_data=  pd.DataFrame(categorical_data)
data_prepared = pd.concat([categorical_data,numerical_data],axis=1, join='inner')
print(data_prepared.shape)

music_prepared = data_prepared[music.columns]
demographic_columns= [item for item in data_prepared.columns if item not in music.columns]
demographic_prepared = data_prepared[demographic_columns]

x_train, x_test, y_train, y_test = train_test_split(data_prepared, music_prepared, test_size=0.33, random_state=42)

def train_clfs(x_train, y_train, x_test, y_test, multilabels=True):
    clfs = {
        "Knn": KNeighborsClassifier(n_neighbors=10),
        "RandomForest": RandomForestClassifier(n_estimators=50),
        "ID3": DecisionTreeClassifier(criterion='entropy'),
        "CART": DecisionTreeClassifier()
    }
    if not multilabels:
        clfs["MLP"] = MLPClassifier(solver='lbfgs', alpha=1e-5, hidden_layer_sizes=(5, 2), random_state=1)
    for i in clfs:
        clf = clfs[i]
        clf = clf.fit(x_train, y_train)
        predicted = clf.predict(x_test)
        print(i, " Accuracy Score: ", accuracy_score(y_test, predicted))
train_clfs( x_train, y_train, x_test, y_test)
print(data['Folk'].corr(data['Country']))