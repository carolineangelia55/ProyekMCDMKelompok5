import pandas as pd
import numpy as np
import json as json

# Load data dr Excel
data = pd.read_excel('C:\\xampp0\\htdocs\\ProyekMCDMKelompok5\\TOPSIS\\data.xlsx')
# maapkan ges soale kl direction e lsg 'gudang.xlsx' pythonku ndak bisa read :( hiks aneh emg)

data = data.iloc[:-1] #biar ga ngambil last row

# Extract nama alternatif dan kriteria
alternatives = data.iloc[:, 0]
criteria = data.columns[1:]


# Matriks ternormalisasi
normalized_matrix = data.copy()
for criterion in criteria:
    column = normalized_matrix[criterion]
    normalized_column = column / np.linalg.norm(column)
    normalized_matrix[criterion] = normalized_column
    
# Matriks normalisasi terbobot
# Array utk weightnya
weights = pd.read_excel('C:\\xampp0\\htdocs\\ProyekMCDMKelompok5\\TOPSIS\\data.xlsx').iloc[-1, 1:].tolist()

# Normalisasi weight vector
weights = weights / np.sum(weights)

# Hitung matrix Y -> matriks normalisasi terbobot
for i, criterion in enumerate(criteria):
    column = normalized_matrix[criterion]
    normalized_column = column / np.linalg.norm(column)
    normalized_weighted_column = normalized_column * weights[i]
    normalized_matrix[criterion] = normalized_weighted_column

#Keuntungan dan biaya
# 1 for keuntungan, -1 for biaya
# Hitung yij+ and yij- 
y_plus = np.max(normalized_matrix, axis=0)
y_minus = np.min(normalized_matrix, axis=0)

# Tentuin keuntungan atau biaya
optimization_direction = []
for i in range(len(y_plus)):
    if y_plus[i] > y_minus[i]:
        optimization_direction.append(1)  # Keuntungan 
    else:
        optimization_direction.append(-1)  # Biaya
# Apply 
y_plus *= optimization_direction
y_minus *= optimization_direction

# Positive Ideal Solution (PIS)
pis = []
for i, criterion in enumerate(criteria):
    pis.append(optimization_direction[i] * np.max(normalized_matrix[criterion]))

# Negative Ideal Solution (NIS)
nis = []
for i, criterion in enumerate(criteria):
    nis.append(optimization_direction[i] * np.min(normalized_matrix[criterion]))

# Hitung jarak
# Jarak PIS
dist_pis = np.sqrt(np.sum(np.square(normalized_matrix[criteria] - pis), axis=1))
# Jarak NIS
dist_nis = np.sqrt(np.sum(np.square(normalized_matrix[criteria] - nis), axis=1))

# Preferensi    
# Hitung preferensi setiap alternatif
preference_values = dist_nis / (dist_nis + dist_pis)

# DataFrame utk simpan alternatif dan preference value nya
alternatives_df = pd.DataFrame({'Alternatives': alternatives, 'Preference Values': preference_values})

# Sort descending order
sorted_alternatives = alternatives_df.sort_values('Preference Values', ascending=False)
sorted_alternatives = sorted_alternatives['Alternatives'].tolist()
sorted_preference = alternatives_df.sort_values('Preference Values', ascending=False)
sorted_preference = sorted_preference['Preference Values'].tolist()

# print(sorted_alternatives)
# print(sorted_preference)

hasil = {"sorted_alternatives": sorted_alternatives, "sorted_preference": sorted_preference}
print(json.dumps(hasil))